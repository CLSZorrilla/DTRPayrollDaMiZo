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

    public partial class FaceDetect : Form
    {
        public string SQL, fileNameimg, comportno, numberOfFaceDetected, empStat, countInOut;
        public int on_time;
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
        List<string> labels= new List<string>();
        List<string> NamePersons = new List<string>();
        int ContTrain, NumLabels, t;
        string name, names = null;


        public FaceDetect()
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

                for (int tf = 1; tf < NumLabels+1; tf++)
                {
                    LoadFaces = "face" + tf + ".bmp";
                    trainingImages.Add(new Image<Gray, byte>(Application.StartupPath + "/TrainedFaces/" + LoadFaces));
                    labels.Add(Labels[tf]);
                }

            }
            catch(Exception)
            {
                MessageBox.Show("Nothing in binary database, please add at least a face(Simply train the prototype with the Add Face Button).", "Triained faces load", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            }

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

                NamePersons[t-1] = name;
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

        public string conn;
        public MySqlConnection connect;
        public MySqlDataAdapter dataAdapter;
        public MySqlDataReader dataReader;
        public MySqlCommand cmd = new MySqlCommand();
        public MySqlCommand cmd1 = new MySqlCommand();


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
            dateTimePicker7.Value = DateTime.Now;
            StartCapturing();
            LoadDG();
        }


        void LoadDG()
        {
            db_connection();
            listView1.Items.Clear();
            cmd = new MySqlCommand("SELECT *,CONCAT(lname, ',',' ',fname,' ',LEFT(mname,1))as fullname FROM timelog a INNER JOIN employee b ON a.empID=b.empID WHERE logdate=@dt ORDER by b.empID DESC", connect);
            cmd.Parameters.AddWithValue("@dt", dateTimePicker7.Text); 
            dataReader = cmd.ExecuteReader();
            while (dataReader.Read())
            {
                ListViewItem lv = new ListViewItem(dataReader["fullname"].ToString());
                    lv.SubItems.Add(dataReader["am_In"].ToString());
                    lv.SubItems.Add(dataReader["am_Out"].ToString());
                    lv.SubItems.Add(dataReader["pm_In"].ToString());
                    lv.SubItems.Add(dataReader["pm_Out"].ToString());
                    listView1.Items.Add(lv);
            }
            dataReader.Close();
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
            lblmonth.Text = DateTime.Now.ToString("MMMM");
            lbldate.Text = DateTime.Now.ToString("dd");
            lblyear.Text = DateTime.Now.ToString("yyyy");
            lblday.Text = DateTime.Now.ToString("dddd");
            lblhour.Text = DateTime.Now.ToString("hh:mm:ss tt");
            dateTimePicker7.Value  = DateTime.Now;
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
            searchEmployee();
        }


        private void searchEmployee()
        {
            Timer3.Stop();

            db_connection();
            cmd = new MySqlCommand("SELECT * FROM employee WHERE empID=@fd1", connect);
            cmd.Parameters.AddWithValue("@fd1", txtEmpID.Text);
            dataReader = cmd.ExecuteReader();
            if ((dataReader.Read()))
            {
                lblEmpID.Text = (dataReader["empID"]).ToString();
                lblname.Text = (dataReader["lname"] + "," + dataReader["fname"] + " " + dataReader["mname"].ToString());
                empStat = (dataReader["status"]).ToString();
                pic2.ImageLocation = dataReader["picture"].ToString();

                //Employee Inactive
                if ((empStat == "Inactive"))
                {
                    MessageBox.Show("Inactive Account.");
                    return;
                }
                empINOUT();
                cmd.Dispose();
                return;
            }
            else
            {
                lblname.Text = "INFORMATION";
            }
        }


        

        

        #region Insert to timelog

        private void CheckBox1_CheckedChanged(System.Object sender, System.EventArgs e)
        {

            if (amCheckBox.Checked == true) //A.M.
            {
                DateTime systemDate = DateTime.Now;
                DTPicker1.Value = DateTime.Now;
                DateTime dt800 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 8, 00, 0);
                DateTime dt815 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 8, 15, 0);

                DateTime dt1000 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 10, 00, 0);
                DateTime dt1015 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 10, 15, 0);


                switch (empStat)
                {
                    case "Regular":
                        if (DateTime.Now <= dt1015 | DateTime.Now <= dt1000) //'til 10:15 a.m.
                        {
                            MessageBox.Show("Time In: " + DTPicker1.Text);
                            on_time = 1;
                        }
                        else
                        {
                            MessageBox.Show("You're Late" + Environment.NewLine + "Time In: " + DTPicker1.Text);
                            on_time = 0;
                        }
                        break;

                    case "Contractual":
                        if (DateTime.Now <= dt815 | DateTime.Now <= dt800) //'til 8:15 a.m.
                        {
                            MessageBox.Show("Time In: " + DTPicker1.Text);
                            on_time = 1;
                        }
                        else
                        {
                            MessageBox.Show("You're Late" + Environment.NewLine + "Time In: " + DTPicker1.Text);
                            on_time = 0;
                        }
                        break;
                    
                    default:
                        MessageBox.Show("INVALID EMPLOYEE STATUS");
                        break;
                }

              
              txtTimeIn.Text = DTPicker1.Text;

            }
            else
            {
                txtTimeIn.Clear();
            }
        }


        private void CheckBox2_CheckedChanged(System.Object sender, System.EventArgs e)
        {
            if (pmCheckBox.Checked == true)//P.M.
            {
                txtTimeOut.Text = DTPicker2.Text;
            }
            else
            {
                txtTimeOut.Clear();
                txthrs.Clear();
                txtmins.Clear();
            }
        }

        #endregion



        #region TimeInOut Using Facerecognition
          
        private void empINOUT()
        {
            db_connection();
            cmd = new MySqlCommand("SELECT * from timelog WHERE empID=@fd1 AND logdate=@fd3", connect);
            cmd.Parameters.AddWithValue("@fd1", lblEmpID.Text);
            cmd.Parameters.AddWithValue("@fd3", dateTimePicker7.Text);
            dataReader = cmd.ExecuteReader();
            if ((dataReader.Read()))
            {
              //  
                countInOut = dataReader["countINOUT"].ToString();
                if (countInOut == "1")
                {
                    DateTime dt05 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 17, 00, 0);

                    if (DateTime.Now < dt05)
                    {
                        pmCheckBox.Checked = true;
                        db_connection();
                        SQL = "UPDATE timeLog SET pm_In=@timeout,countINOUT='2' WHERE empID=@empID AND logdate=@dt";
                        cmd = new MySql.Data.MySqlClient.MySqlCommand(SQL, connect);
                        {
                            cmd.Parameters.AddWithValue("@empID", lblEmpID.Text);
                            cmd.Parameters.AddWithValue("@dt", dateTimePicker7.Text);
                            cmd.Parameters.AddWithValue("@timeout", lblhour .Text );
                        }

                        cmd.ExecuteNonQuery();
                        cmd.Dispose();

                        SaveImage();
                        MessageBox.Show(lblhour .Text );
                        pmCheckBox.Checked = false;
                        clr();
                        return;
                    }
                    else
                    {
                        MessageBox.Show("Not 05:00");
                    }
                }
                if (countInOut == "2")
                {

                    empOUT();
                    return;
                }
                if (countInOut == "0")
                {
                    DateTime dt12 = new DateTime(DateTime.Now.Year, DateTime.Now.Month, DateTime.Now.Day, 12, 00, 0);

                    if (DateTime.Now >= dt12)
                    {
                        pmCheckBox.Checked = true;
                        db_connection();
                        SQL = "UPDATE timeLog SET am_out=@timeout,countINOUT='1' WHERE empID=@empID AND logdate=@dt";
                        cmd = new MySql.Data.MySqlClient.MySqlCommand(SQL, connect);
                        {
                            cmd.Parameters.AddWithValue("@empID", lblEmpID.Text);
                            cmd.Parameters.AddWithValue("@dt", dateTimePicker7.Text);
                            cmd.Parameters.AddWithValue("@timeout",  lblhour .Text );
                        }

                        cmd.ExecuteNonQuery();
                        cmd.Dispose();
                        
                        SaveImage();
                        MessageBox.Show(lblhour .Text );
                        pmCheckBox.Checked = false;
                        clr();
                        return;
                    }
                    else
                    {
                        MessageBox.Show("Not 12:00");
                    }

                }
            }
            else
            {

                empIN();
                cmd.Dispose();
                return;
            }
        }
        

        private void empIN()
        {
            amCheckBox.Checked = true;
            db_connection();
            SQL = "INSERT INTO timelog (`empID`, `logdate`, `AM_IN`, `onTime`) VALUES(@empID,@dt,@timein,@stat)";
            cmd = new MySql.Data.MySqlClient.MySqlCommand(SQL, connect);
            {
                cmd.Parameters.AddWithValue("@empID", lblEmpID.Text);
                cmd.Parameters.AddWithValue("@dt", dateTimePicker7.Text);
                cmd.Parameters.AddWithValue("@timein", txtTimeIn.Text);
                cmd.Parameters.AddWithValue("@stat", on_time);
            }
            cmd.ExecuteNonQuery();
            cmd.Dispose();
            
            SaveImage();
            amCheckBox.Checked = false;
            lblEmpID.Text = "ID";
            clr();
        }


        private void empOUT()
        {
            db_connection();
            cmd = new MySqlCommand("SELECT * FROM timeLog WHERE empID=@empID AND logdate=@dt", connect);
            cmd.Parameters.AddWithValue("@empID", lblEmpID.Text);
            cmd.Parameters.AddWithValue("@dt", dateTimePicker7.Text);
            dataReader = cmd.ExecuteReader();
            if ((dataReader.Read()))
            {

                DateTime dt = Convert.ToDateTime(dataReader["am_IN"]);
                DateTime dt1 = Convert.ToDateTime(dataReader["pm_In"]);
                DTPicker1.Value = dt;
                DTP3.Value = dt1;

                pmCheckBox.Checked = true;

                db_connection();//,countINOUT='3' FINISH PM_OUT
                SQL = "UPDATE timeLog SET pm_out=@timeout,countINOUT='3' WHERE empID=@empID AND logdate=@dt";
                cmd = new MySql.Data.MySqlClient.MySqlCommand(SQL, connect);
                {
                    cmd.Parameters.AddWithValue("@empID", lblEmpID.Text);
                    cmd.Parameters.AddWithValue("@dt", dateTimePicker7.Text);
                    cmd.Parameters.AddWithValue("@timeout", lblhour.Text);
                }
                cmd.ExecuteNonQuery();
                cmd.Dispose();

                MessageBox.Show("Successfully Out", "System", MessageBoxButtons.OK, MessageBoxIcon.Information);
                pmCheckBox.Checked = false;
                clr();
            }
        }

        #endregion
     

        void clr()
        {
            dateTimePicker7.Value = DateTime.Now;
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

        private void button1_Click(object sender, EventArgs e)
        {
            this.Hide();
            RegisterFace d = new RegisterFace();
            d.ShowDialog();
        }
   }
}