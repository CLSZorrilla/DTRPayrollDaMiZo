using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;
using Emgu.CV;
using Emgu.CV.Structure;
using Emgu.CV.CvEnum;
using System.IO;
using System.Diagnostics;
using MySql.Data.MySqlClient;
using System.Data;

using System.IO.Ports;
namespace FaceRecognition
{
    public partial class FormMain : Form
    {
        public string query, fileNameimg, comportno, numberOfFaceDetected, empStat, activated, countInOut, count, what_column, start, end;
        public int on_time_AM, on_time_PM;
        public float vacationLeave = 0, basic_pay = 0, to_deduct = 0;
        System.IO.Ports.SerialPort SerialPort1 = new System.IO.Ports.SerialPort();

        //Declararation of all variables, vectors and haarcascades
        Image<Bgr, Byte> currentFrame;
        Capture grabber;
        HaarCascade face;
        //HaarCascade eye;
        MCvFont font = new MCvFont(FONT.CV_FONT_HERSHEY_TRIPLEX, 0.5d, 0.5d);
        Image<Gray, byte> result, TrainedFace = null;
        Image<Gray, byte> gray = null;
        List<Image<Gray, byte>> trainingImages = new List<Image<Gray, byte>>();
        List<string> labels = new List<string>();
        List<string> NamePersons = new List<string>();
        int ContTrain, NumLabels, t;
        string name, names = null;


        public FormMain()
        {
            InitializeComponent();
            face = new HaarCascade("haarcascade_frontalface_default.xml");

            try
            {
                //Load of previous trained faces and labels for each image
                string Labelsinfo = File.ReadAllText(Application.StartupPath + "/TrainedFaces/TrainedLabels.txt");
                string[] Labels = Labelsinfo.Split('%');
                NumLabels = Convert.ToInt16(Labels[0]);
                ContTrain = NumLabels;
                string LoadFaces;

                for (int tf = 1; tf < NumLabels + 1; tf++)
                {
                    LoadFaces = "face" + tf + ".bmp";
                    trainingImages.Add(new Image<Gray, byte>(Application.StartupPath + "/TrainedFaces/" + LoadFaces));
                    labels.Add(Labels[tf]);
                }

            }
            catch (Exception)
            {
                MessageBox.Show("Nothing in binary database, please add at least a face(Simply train the prototype with the Add Face Button).", "Triained faces load", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            }

        }

        public string conn;
        public MySqlConnection connect;
        public MySqlDataAdapter dataAdapter;
        public MySqlDataReader dataReader;
        public MySqlCommand cmd = new MySqlCommand();
        public MySqlCommand cmd1 = new MySqlCommand();
        public MySqlCommand cmd2 = new MySqlCommand();
        public MySqlCommand cmd3 = new MySqlCommand();


        void db_connection()
        {
            try
            {
                conn = "Server=localhost;Database=payrolldb;Uid=root;Pwd=;";
                connect = new MySqlConnection(conn);
                connect.Open();
            }
            catch (MySqlException e)
            {
                MessageBox.Show("Database not connected!");
                throw e;
            }
        }

        private void FrmPrincipal_Load(object sender, EventArgs e)
        {
            timer1.Start();
            StartCapturing();
        }


        private void StartCapturing()
        {
            grabber = new Capture();
            grabber.QueryFrame();
            Application.Idle += new EventHandler(FrameGrabber);
        }


        void FrameGrabber(object sender, EventArgs e)
        {
            NamePersons.Add("");
            currentFrame = grabber.QueryFrame().Resize(320, 240, Emgu.CV.CvEnum.INTER.CV_INTER_CUBIC);

            gray = currentFrame.Convert<Gray, Byte>();      //Convert it to Grayscale
            MCvAvgComp[][] facesDetected = gray.DetectHaarCascade(  //Face Detector
            face,
            1.2,
            10,
            Emgu.CV.CvEnum.HAAR_DETECTION_TYPE.DO_CANNY_PRUNING,
            new Size(20, 20));

            //Action for each element detected
            foreach (MCvAvgComp f in facesDetected[0])
            {
                t = t + 1;
                result = currentFrame.Copy(f.rect).Convert<Gray, byte>().Resize(100, 100, Emgu.CV.CvEnum.INTER.CV_INTER_CUBIC);
                //draw the face detected in the 0th (gray) channel with blue color
                currentFrame.Draw(f.rect, new Bgr(Color.Red), 2);


                if (trainingImages.ToArray().Length != 0)
                {
                    //TermCriteria for face recognition with numbers of trained images like maxIteration
                    MCvTermCriteria termCrit = new MCvTermCriteria(ContTrain, 0.001);

                    //Eigen face recognizer
                    EigenObjectRecognizer recognizer = new EigenObjectRecognizer(
                        trainingImages.ToArray(),
                        labels.ToArray(),
                        3000,
                        ref termCrit);

                    name = recognizer.Recognize(result);

                    //Draw the label for each face detected and recognized
                    currentFrame.Draw(name, ref font, new Point(f.rect.X - 2, f.rect.Y - 2), new Bgr(Color.LightGreen));

                }

                NamePersons[t - 1] = name;
                NamePersons.Add("");
                numberOfFaceDetected = facesDetected[0].Length.ToString();
            }

            t = 0;

            //Names concatenation of persons recognized
            for (int nnn = 0; nnn < facesDetected[0].Length; nnn++)
            {
                names = names + NamePersons[nnn];
            }
            //Show the faces procesed and recognized
            imageBoxFrameGrabber.Image = currentFrame;

            txtEmpID.Text = names;
            lblEmpID.Text = names;
            names = "";
            //Clear the list(vector) of names
            NamePersons.Clear();

        }


        void SaveImage()
        {
            try
            {
                TrainedFace = result.Resize(100, 100, Emgu.CV.CvEnum.INTER.CV_INTER_CUBIC);
                imageBox1.Image = TrainedFace; //Show face added in gray scale

                SaveFileDialog sfd = new SaveFileDialog();
                sfd.Filter = "Image|*.jpg";
                if (lblEmpID.Text == "ID")
                {
                    fileNameimg = Application.StartupPath + "\\ImageTrack\\" + DateTime.Now.ToString("yyMMdd-hhmmtt") + "(" + lblEmpID.Text + ")" + ".jpg";
                }
                else { fileNameimg = Application.StartupPath + "\\ImageTrack\\" + DateTime.Now.ToString("yyMMdd-hhmmtt") + "(" + lblEmpID.Text + ")" + ".jpg"; }

                sfd.FileName = fileNameimg;
                imageBoxFrameGrabber.Image.Save(sfd.FileName);
            }
            catch
            {
            }
        }


        private void timer1_Tick(object sender, EventArgs e)
        {
            clockControl9.Value = DateTime.Now;
            lblmonth.Text = DateTime.Now.ToString("MMMM").ToUpper();
            lbldate.Text = DateTime.Now.ToString("dd");
            lblyear.Text = DateTime.Now.ToString("yyyy");
            lblday.Text = DateTime.Now.ToString("dddd").ToUpper();
            lblhour.Text = DateTime.Now.ToString("hh:mm tt");
        }


        private void txtEmpID_TextChanged(object sender, EventArgs e)
        {
            if (txtEmpID.Text != "")
            {
                Timer3.Start();
            }
        }


        private void Timer3_Tick(object sender, EventArgs e)
        {
            if (txtEmpID.Text == "")
            { btnCapture.Enabled = false; }
            else
            { btnCapture.Enabled = true; }
                searchEmployee();
                searchCompany();
        }


        private void searchCompany()
        { 
            db_connection();
            cmd = new MySqlCommand("SELECT * FROM company_profile WHERE name='" + company_name.Text + "'", connect);
            dataReader = cmd.ExecuteReader();
            if (dataReader.Read())
            {
                start = (dataReader["startTime"]).ToString();
                end = (dataReader["endTime"]).ToString();
            }
        }

        //get values from employee tbl
        private void searchEmployee()
        {
            Timer3.Stop();

            db_connection();
            cmd = new MySqlCommand("SELECT * FROM employee WHERE empID='" + txtEmpID.Text + "'", connect);
            dataReader = cmd.ExecuteReader();
            if (dataReader.Read())
            {
                lblEmpID.Text = (dataReader["empID"]).ToString();
                lblname.Text = (dataReader["lname"] + "," + dataReader["fname"] + " " + dataReader["mname"].ToString());
                activated = (dataReader["activated"]).ToString();
                empStat = (dataReader["status"]).ToString();
                vacationLeave = (float)dataReader["VL"];
                basic_pay = (float)dataReader["basicPay"];
                pic2.ImageLocation = dataReader["picture"].ToString();

                //checks if account is not activated
                if (activated == "FALSE")
                {
                    MessageBox.Show("Inactive Account.");
                    return;
                }
                //empINOUT();
                cmd.Dispose();
                return;
            }
            else
            {
                lblname.Text = "INFORMATION";
            }
        }


        protected override bool ProcessCmdKey(ref Message msg, Keys keyData)
        {
            if (keyData == Keys.Enter)
            {
                btnCapture.PerformClick();
                return true;
            }
            return base.ProcessCmdKey(ref msg, keyData);
        }


        private void btnCapture_Click(object sender, EventArgs e)
        {
            DateTime currentDate = DateTime.Now;
            string militaryTime = currentDate.ToString("HH:mm tt");
            string time_only = currentDate.ToString("hh:mm tt");
            string date_only = currentDate.ToString("yyyy-MM-dd");

            //convert official time to DateTime
            DateTime _start = DateTime.Parse(start);
            DateTime _end = DateTime.Parse(end);

            DateTime dt1300 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 13, 00, 59); //1PM
            
            int minsLate1 = 0, minsLate2 = 0, x = 0, y = 0, g = 0, f = 0;
            float to_deduct1 = 0, condition = 0;
            TimeSpan timeLate;

            DateTime two = DateTime.Now.AddHours(2);
            DateTime dtr_start, dtr_end;
            dtr_start = _start.AddHours(2);
            dtr_end = _start.AddHours(10);

            if (currentDate < dtr_start || currentDate > dtr_end)
            {
                MessageBox.Show("out of office hours!");
            }
            else
            {
                //checks if employee already timed in for the day
                db_connection();
                cmd1 = new MySqlCommand("SELECT COUNT(*) FROM timelog WHERE empID ='" + txtEmpID.Text + "' AND logdate ='" + date_only + "' ", connect);
                string AlreadyExist = cmd1.ExecuteScalar().ToString();
                if (AlreadyExist == "0")//timeIn
                {
                    switch (empStat)
                    {
                        case "Regular":
                            if (currentDate <= _start)
                            {
                                MessageBox.Show("Time In: " + time_only);
                                on_time_AM = 1;
                            }
                            else //late
                            {
                                MessageBox.Show("Time In: " + time_only);
                                on_time_AM = 0;

                                //count minutes late
                                timeLate = currentDate - _start;
                                x = timeLate.Hours;
                                if (timeLate.Minutes != 0)
                                {
                                    y = (timeLate.Minutes);
                                }

                                minsLate1 = (x * 60) + y;
                               // to_deduct1 = (float)minsLate1 * (float)0.002;
                            }
                            break;

                        case "Contractual":
                            if (currentDate <= _start)
                            {
                                MessageBox.Show("Time In: " + time_only);
                                on_time_AM = 1;
                            }
                            else //late
                            {
                                MessageBox.Show("Time In: " + time_only);
                                on_time_AM = 0;

                                //count minutes late
                                timeLate = currentDate - _start;
                                x = timeLate.Hours;
                                if (timeLate.Minutes != 0)
                                {
                                    y = (timeLate.Minutes);
                                }

                                minsLate1 = (x * 60) + y;
                                //to_deduct1 = (float)minsLate1 * (float)0.002;
                            }
                            break;

                        default:
                            MessageBox.Show("INVALID EMPLOYEE STATUS");
                            break;
                    }

                    //insert to db
                    db_connection();
                    query = "INSERT INTO timelog(empID, logdate, timeIn, countInOut, onTime_AM) VALUES('" + txtEmpID.Text + "','" + date_only + "','" + militaryTime + "', 1,'" + on_time_AM + "');";
                    cmd = new MySqlCommand(query, connect);

                    cmd.ExecuteNonQuery();
                    cmd.Dispose();

                    SaveImage();
                }
                else //amOut onwards
                {

                    //get countInOut value from db
                    db_connection();
                    cmd = new MySqlCommand("SELECT * FROM timelog WHERE empID ='" + txtEmpID.Text + "' AND logdate ='" + date_only + "'", connect);
                    dataReader = cmd.ExecuteReader();
                    if (dataReader.Read())
                    {
                        countInOut = dataReader["countInOut"].ToString();

                        switch (countInOut)
                        {
                            case "1"://amOut
                                MessageBox.Show("AM Out: " + time_only);
                                what_column = "amOut";
                                count = "2";
                                break;

                            case "2"://pmIn
                                what_column = "pmIn";
                                count = "3";
                                if (currentDate <= dt1300)
                                {
                                    MessageBox.Show("PM In: " + time_only);
                                    on_time_PM = 1;
                                }
                                else //late
                                {
                                    MessageBox.Show("PM In: " + time_only);
                                    on_time_PM = 0;

                                    //count minutes late
                                    timeLate = currentDate - dt1300;
                                    g = timeLate.Hours;
                                    if (timeLate.Minutes != 0)
                                    {
                                        f = (timeLate.Minutes);
                                    }

                                    minsLate2 = (g * 60) + f;

                                    minsLate2 += minsLate1; // total of minutes late for the day
                                }
                                break;

                            case "3"://timeOut
                                MessageBox.Show("Time Out: " + time_only);
                                what_column = "timeOut";
                                count = "4";
                                break;

                            default:
                                MessageBox.Show("You're already done for the day.");
                                count = "5";
                                break;
                        }


                        if (count == "2" || count == "3" || count == "4")
                        {
                            //update db
                            db_connection();
                            query = "UPDATE timeLog SET " + what_column + "='" + militaryTime + "', timeOut ='" + militaryTime + "', countInOut='" + count + "', onTime_PM = '" + on_time_PM + "' WHERE empID='" + txtEmpID.Text + "' AND logdate='" + date_only + "'";
                            cmd2 = new MySqlCommand(query, connect);

                            cmd2.ExecuteNonQuery();
                            cmd2.Dispose();
                            compute();
                            SaveImage();

                            if (count == "3")
                            {
                                to_deduct1 = (float)minsLate2 * (float)0.002; //total minutes converted to equivalent day based on 8 hour workday

                                //subtract to_deduct2 to VL from employee tbl
                                condition = vacationLeave - to_deduct1;

                                if (condition < 0) //save the remaining balance to toDeduct @ tbl employee
                                {
                                    condition = 0;
                                    to_deduct = to_deduct1 - vacationLeave;
                                    to_deduct = (basic_pay / 10560) * to_deduct1; //10560 = 22 * 8 * 60
                                }

                                query = "UPDATE employee SET VL ='" + condition + "', toDeduct ='" + to_deduct + "' WHERE empID='" + txtEmpID.Text + "'";
                                cmd3 = new MySqlCommand(query, connect);

                                cmd3.ExecuteNonQuery();
                                cmd3.Dispose();
                            }
                        }

                    }
                }
            }
        }

        int a, b, c, d, totalmin, totalhrs;
        string StartTime, EndTime, am_out, pm_in;
        string date_only = DateTime.Now.ToString("yyyy-MM-dd");
        DateTime dt1300 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 13, 00, 0); //1PM
        DateTime dt1200 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 12, 00, 59); //12PM

        private void compute()
        {
            //get all time value from timelog
            db_connection();
            cmd = new MySqlCommand("SELECT * FROM timelog WHERE empID ='" + txtEmpID.Text + "' AND logdate ='" + date_only + "'", connect);
            dataReader = cmd.ExecuteReader();
            if (dataReader.Read())
            {
                countInOut = dataReader["countInOut"].ToString();
                StartTime = dataReader["timeIn"].ToString();
                EndTime = dataReader["timeOut"].ToString();
                am_out = dataReader["amOut"].ToString();
                pm_in = dataReader["pmIn"].ToString();
            }

            DateTime timeIn = DateTime.Parse(StartTime);
            DateTime amOut = DateTime.Parse(am_out);
            DateTime timeOut = DateTime.Parse(EndTime);

            if (amOut > dt1200) { amOut = dt1200; } //if amOut is later than 12:00 PM, amOut time is still 12:00 PM

            switch (countInOut)
            {
                case "2"://done with amOut
                    TimeSpan TimeDifference = timeOut - timeIn;
                    a = TimeDifference.Hours;
                    if (TimeDifference.Minutes != 0)
                    {
                        b = (TimeDifference.Minutes);
                    }

                    totalhrs = ((a * 60) + b) / 60; //GET TOTAL HOURS WORK
                    totalmin = ((a * 60) + b) % 60;//GET TOTAL MINS WORK
                    break;


                case "4"://done with timeOut

                    DateTime pmIn = DateTime.Parse(pm_in);

                    if (pmIn < dt1300) { pmIn = dt1300; } //if pmIn is earlier than 1:00 PM, start time is still 1:00 PM

                    //amShift
                    TimeSpan TimeDifferenceAM = amOut - timeIn;
                    a = TimeDifferenceAM.Hours;
                    if (TimeDifferenceAM.Minutes != 0)
                    {
                        b = (TimeDifferenceAM.Minutes);
                    }

                    //pmShift
                    TimeSpan TimeDifferencePM = timeOut - pmIn;
                    c = TimeDifferencePM.Hours;
                    if (TimeDifferencePM.Minutes != 0)
                    {
                        d = (TimeDifferencePM.Minutes);
                    }
                    totalhrs = (((a * 60) + b) + ((c * 60) + d)) / 60; //GET TOTAL HOURS WORK
                    totalmin = (((a * 60) + b) + ((c * 60) + d)) % 60;//GET TOTAL MINS WORK
                    break;

                default:
                    //MessageBox.Show("INVALID countInOut value");
                    break;
            }

            db_connection();
            query = "UPDATE timeLog SET hrsWorked ='" + totalhrs + "', minsWorked='" + totalmin + "' WHERE empID='" + txtEmpID.Text + "' AND logdate='" + date_only + "'";
            cmd = new MySqlCommand(query, connect);

            cmd.ExecuteNonQuery();
        }

        void clr()
        {
            lblname.Text = "INFORMATION";
            lblEmpID.Text = "ID";
            txtEmpID.Text = "";
            txtEmpID.Focus();
        }

        private void lblIDNumber_Click(object sender, EventArgs e)
        {
            if (lblEmpID.Text == "ID" | lblEmpID.Text == "")
            {
            }
            else
            {
                searchEmployee();
            }
        }

        private void btnRegisterFace_Click(object sender, EventArgs e)
        {
            this.Hide();
            RegisterFace d = new RegisterFace();
            d.Show();
            d.Focus();
        }
    }
}