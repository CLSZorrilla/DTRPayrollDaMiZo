namespace FaceRecognition
{
    partial class FormMain
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            DevComponents.DotNetBar.Controls.ClockStyleData clockStyleData1 = new DevComponents.DotNetBar.Controls.ClockStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData1 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData2 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData3 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ClockHandStyleData clockHandStyleData1 = new DevComponents.DotNetBar.Controls.ClockHandStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData4 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData5 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ClockHandStyleData clockHandStyleData2 = new DevComponents.DotNetBar.Controls.ClockHandStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData6 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ClockHandStyleData clockHandStyleData3 = new DevComponents.DotNetBar.Controls.ClockHandStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData7 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData8 = new DevComponents.DotNetBar.Controls.ColorData();
            this.tableLayoutPanel1 = new System.Windows.Forms.TableLayoutPanel();
            this.panel1 = new System.Windows.Forms.Panel();
            this.tableLayoutPanel2 = new System.Windows.Forms.TableLayoutPanel();
            this.panel2 = new System.Windows.Forms.Panel();
            this.label1 = new System.Windows.Forms.Label();
            this.tableLayoutPanel3 = new System.Windows.Forms.TableLayoutPanel();
            this.tableLayoutPanel4 = new System.Windows.Forms.TableLayoutPanel();
            this.imageBoxFrameGrabber = new Emgu.CV.UI.ImageBox();
            this.tableLayoutPanel5 = new System.Windows.Forms.TableLayoutPanel();
            this.imageBox1 = new Emgu.CV.UI.ImageBox();
            this.tableLayoutPanel6 = new System.Windows.Forms.TableLayoutPanel();
            this.btnRegisterFace = new System.Windows.Forms.Button();
            this.btnCapture = new System.Windows.Forms.Button();
            this.tableLayoutPanel7 = new System.Windows.Forms.TableLayoutPanel();
            this.tableLayoutPanel8 = new System.Windows.Forms.TableLayoutPanel();
            this.clockControl9 = new DevComponents.DotNetBar.Controls.AnalogClockControl();
            this.panel5 = new System.Windows.Forms.Panel();
            this.lblhour = new System.Windows.Forms.Label();
            this.lblyear = new System.Windows.Forms.Label();
            this.lblday = new System.Windows.Forms.Label();
            this.lblmonth = new System.Windows.Forms.Label();
            this.lbldate = new System.Windows.Forms.Label();
            this.panel4 = new System.Windows.Forms.Panel();
            this.txtEmpID = new System.Windows.Forms.TextBox();
            this.pic2 = new System.Windows.Forms.PictureBox();
            this.Label2 = new System.Windows.Forms.Label();
            this.lblname = new System.Windows.Forms.Label();
            this.lblEmpID = new System.Windows.Forms.Label();
            this.timer1 = new System.Windows.Forms.Timer(this.components);
            this.Timer3 = new System.Windows.Forms.Timer(this.components);
            this.tableLayoutPanel1.SuspendLayout();
            this.tableLayoutPanel2.SuspendLayout();
            this.tableLayoutPanel3.SuspendLayout();
            this.tableLayoutPanel4.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.imageBoxFrameGrabber)).BeginInit();
            this.tableLayoutPanel5.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.imageBox1)).BeginInit();
            this.tableLayoutPanel6.SuspendLayout();
            this.tableLayoutPanel7.SuspendLayout();
            this.tableLayoutPanel8.SuspendLayout();
            this.panel5.SuspendLayout();
            this.panel4.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pic2)).BeginInit();
            this.SuspendLayout();
            // 
            // tableLayoutPanel1
            // 
            this.tableLayoutPanel1.BackColor = System.Drawing.Color.White;
            this.tableLayoutPanel1.ColumnCount = 1;
            this.tableLayoutPanel1.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel1.Controls.Add(this.panel1, 0, 1);
            this.tableLayoutPanel1.Controls.Add(this.tableLayoutPanel2, 0, 0);
            this.tableLayoutPanel1.Controls.Add(this.tableLayoutPanel3, 0, 2);
            this.tableLayoutPanel1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel1.Location = new System.Drawing.Point(0, 0);
            this.tableLayoutPanel1.Name = "tableLayoutPanel1";
            this.tableLayoutPanel1.RowCount = 3;
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 55F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel1.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel1.Size = new System.Drawing.Size(1058, 657);
            this.tableLayoutPanel1.TabIndex = 0;
            // 
            // panel1
            // 
            this.panel1.BackColor = System.Drawing.Color.Blue;
            this.panel1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel1.Location = new System.Drawing.Point(3, 58);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(1052, 14);
            this.panel1.TabIndex = 0;
            // 
            // tableLayoutPanel2
            // 
            this.tableLayoutPanel2.ColumnCount = 4;
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 15F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 50F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 500F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel2.Controls.Add(this.panel2, 1, 0);
            this.tableLayoutPanel2.Controls.Add(this.label1, 2, 0);
            this.tableLayoutPanel2.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel2.Location = new System.Drawing.Point(3, 3);
            this.tableLayoutPanel2.Name = "tableLayoutPanel2";
            this.tableLayoutPanel2.RowCount = 1;
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel2.Size = new System.Drawing.Size(1052, 49);
            this.tableLayoutPanel2.TabIndex = 1;
            // 
            // panel2
            // 
            this.panel2.BackgroundImage = global::FaceRecognition.Properties.Resources.LTO_logo;
            this.panel2.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.panel2.Location = new System.Drawing.Point(18, 3);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(44, 43);
            this.panel2.TabIndex = 0;
            // 
            // label1
            // 
            this.label1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Arial", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.label1.Location = new System.Drawing.Point(76, 8);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(478, 32);
            this.label1.TabIndex = 2;
            this.label1.Text = "LTO DAILY EMPLOYEE TIME IN/OUT";
            // 
            // tableLayoutPanel3
            // 
            this.tableLayoutPanel3.ColumnCount = 4;
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 150F));
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 362F));
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel3.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 150F));
            this.tableLayoutPanel3.Controls.Add(this.tableLayoutPanel4, 1, 1);
            this.tableLayoutPanel3.Controls.Add(this.tableLayoutPanel7, 2, 1);
            this.tableLayoutPanel3.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel3.Location = new System.Drawing.Point(3, 78);
            this.tableLayoutPanel3.Name = "tableLayoutPanel3";
            this.tableLayoutPanel3.RowCount = 3;
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 50F));
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel3.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 50F));
            this.tableLayoutPanel3.Size = new System.Drawing.Size(1052, 576);
            this.tableLayoutPanel3.TabIndex = 2;
            // 
            // tableLayoutPanel4
            // 
            this.tableLayoutPanel4.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(192)))));
            this.tableLayoutPanel4.ColumnCount = 1;
            this.tableLayoutPanel4.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel4.Controls.Add(this.imageBoxFrameGrabber, 0, 0);
            this.tableLayoutPanel4.Controls.Add(this.tableLayoutPanel5, 0, 1);
            this.tableLayoutPanel4.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel4.Location = new System.Drawing.Point(153, 53);
            this.tableLayoutPanel4.Name = "tableLayoutPanel4";
            this.tableLayoutPanel4.RowCount = 2;
            this.tableLayoutPanel4.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 356F));
            this.tableLayoutPanel4.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 100F));
            this.tableLayoutPanel4.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel4.Size = new System.Drawing.Size(356, 470);
            this.tableLayoutPanel4.TabIndex = 0;
            // 
            // imageBoxFrameGrabber
            // 
            this.imageBoxFrameGrabber.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.imageBoxFrameGrabber.BackColor = System.Drawing.SystemColors.Control;
            this.imageBoxFrameGrabber.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.imageBoxFrameGrabber.Location = new System.Drawing.Point(3, 3);
            this.imageBoxFrameGrabber.Name = "imageBoxFrameGrabber";
            this.imageBoxFrameGrabber.Size = new System.Drawing.Size(350, 350);
            this.imageBoxFrameGrabber.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.imageBoxFrameGrabber.TabIndex = 5;
            this.imageBoxFrameGrabber.TabStop = false;
            // 
            // tableLayoutPanel5
            // 
            this.tableLayoutPanel5.ColumnCount = 2;
            this.tableLayoutPanel5.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 152F));
            this.tableLayoutPanel5.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel5.Controls.Add(this.imageBox1, 0, 0);
            this.tableLayoutPanel5.Controls.Add(this.tableLayoutPanel6, 1, 0);
            this.tableLayoutPanel5.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel5.Location = new System.Drawing.Point(3, 359);
            this.tableLayoutPanel5.Name = "tableLayoutPanel5";
            this.tableLayoutPanel5.RowCount = 1;
            this.tableLayoutPanel5.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel5.Size = new System.Drawing.Size(350, 108);
            this.tableLayoutPanel5.TabIndex = 6;
            // 
            // imageBox1
            // 
            this.imageBox1.BackColor = System.Drawing.SystemColors.Control;
            this.imageBox1.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.imageBox1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.imageBox1.Location = new System.Drawing.Point(3, 3);
            this.imageBox1.Name = "imageBox1";
            this.imageBox1.Size = new System.Drawing.Size(146, 102);
            this.imageBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.imageBox1.TabIndex = 1129;
            this.imageBox1.TabStop = false;
            // 
            // tableLayoutPanel6
            // 
            this.tableLayoutPanel6.ColumnCount = 1;
            this.tableLayoutPanel6.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel6.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel6.Controls.Add(this.btnRegisterFace, 0, 1);
            this.tableLayoutPanel6.Controls.Add(this.btnCapture, 0, 0);
            this.tableLayoutPanel6.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel6.Location = new System.Drawing.Point(155, 3);
            this.tableLayoutPanel6.Name = "tableLayoutPanel6";
            this.tableLayoutPanel6.RowCount = 2;
            this.tableLayoutPanel6.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel6.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel6.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel6.Size = new System.Drawing.Size(192, 102);
            this.tableLayoutPanel6.TabIndex = 1130;
            // 
            // btnRegisterFace
            // 
            this.btnRegisterFace.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.btnRegisterFace.Location = new System.Drawing.Point(45, 65);
            this.btnRegisterFace.Name = "btnRegisterFace";
            this.btnRegisterFace.Size = new System.Drawing.Size(101, 23);
            this.btnRegisterFace.TabIndex = 1132;
            this.btnRegisterFace.Text = "Register Face";
            this.btnRegisterFace.UseVisualStyleBackColor = true;
            this.btnRegisterFace.Click += new System.EventHandler(this.btnRegisterFace_Click);
            // 
            // btnCapture
            // 
            this.btnCapture.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.btnCapture.Location = new System.Drawing.Point(45, 15);
            this.btnCapture.Name = "btnCapture";
            this.btnCapture.Size = new System.Drawing.Size(101, 21);
            this.btnCapture.TabIndex = 1133;
            this.btnCapture.Text = "Capture!";
            this.btnCapture.UseVisualStyleBackColor = true;
            this.btnCapture.Click += new System.EventHandler(this.btnCapture_Click);
            // 
            // tableLayoutPanel7
            // 
            this.tableLayoutPanel7.ColumnCount = 1;
            this.tableLayoutPanel7.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel7.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel7.Controls.Add(this.tableLayoutPanel8, 0, 0);
            this.tableLayoutPanel7.Controls.Add(this.panel4, 0, 1);
            this.tableLayoutPanel7.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel7.Location = new System.Drawing.Point(515, 53);
            this.tableLayoutPanel7.Name = "tableLayoutPanel7";
            this.tableLayoutPanel7.RowCount = 2;
            this.tableLayoutPanel7.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel7.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel7.Size = new System.Drawing.Size(384, 470);
            this.tableLayoutPanel7.TabIndex = 1;
            // 
            // tableLayoutPanel8
            // 
            this.tableLayoutPanel8.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(192)))), ((int)(((byte)(192)))), ((int)(((byte)(255)))));
            this.tableLayoutPanel8.ColumnCount = 5;
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle());
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.Controls.Add(this.panel5, 1, 1);
            this.tableLayoutPanel8.Controls.Add(this.clockControl9, 3, 1);
            this.tableLayoutPanel8.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel8.Location = new System.Drawing.Point(3, 3);
            this.tableLayoutPanel8.Name = "tableLayoutPanel8";
            this.tableLayoutPanel8.RowCount = 3;
            this.tableLayoutPanel8.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel8.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.Size = new System.Drawing.Size(378, 229);
            this.tableLayoutPanel8.TabIndex = 1126;
            // 
            // clockControl9
            // 
            this.clockControl9.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.clockControl9.BackColor = System.Drawing.Color.Transparent;
            this.clockControl9.ClockStyle = DevComponents.DotNetBar.Controls.eClockStyles.Custom;
            colorData1.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(120)))), ((int)(((byte)(120)))), ((int)(((byte)(120)))));
            colorData1.BorderWidth = 0.01F;
            colorData1.BrushSBSScale = 1F;
            colorData1.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData1.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            colorData1.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(152)))), ((int)(((byte)(152)))), ((int)(((byte)(152)))));
            clockStyleData1.BezelColor = colorData1;
            colorData2.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData2.BorderWidth = 0.01F;
            colorData2.BrushSBSScale = 1F;
            colorData2.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData2.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockStyleData1.CapColor = colorData2;
            colorData3.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(135)))), ((int)(((byte)(145)))), ((int)(((byte)(161)))));
            colorData3.BorderWidth = 0.01F;
            colorData3.BrushAngle = 45F;
            colorData3.BrushSBSScale = 1F;
            colorData3.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData3.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(191)))), ((int)(((byte)(204)))), ((int)(((byte)(213)))));
            colorData3.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            clockStyleData1.FaceColor = colorData3;
            clockStyleData1.GlassAngle = -20;
            colorData4.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData4.BorderWidth = 0.01F;
            colorData4.BrushSBSScale = 1F;
            colorData4.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData4.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockHandStyleData1.HandColor = colorData4;
            clockHandStyleData1.Length = 0.55F;
            clockHandStyleData1.Width = 0.015F;
            clockStyleData1.HourHandStyle = clockHandStyleData1;
            colorData5.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            colorData5.BorderWidth = 0.01F;
            colorData5.BrushSBSScale = 1F;
            colorData5.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData5.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            colorData5.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            clockStyleData1.LargeTickColor = colorData5;
            colorData6.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData6.BorderWidth = 0.01F;
            colorData6.BrushSBSScale = 1F;
            colorData6.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData6.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockHandStyleData2.HandColor = colorData6;
            clockHandStyleData2.Length = 0.8F;
            clockHandStyleData2.Width = 0.01F;
            clockStyleData1.MinuteHandStyle = clockHandStyleData2;
            clockStyleData1.NumberFont = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Pixel);
            colorData7.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData7.BorderWidth = 0.01F;
            colorData7.BrushSBSScale = 1F;
            colorData7.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData7.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockHandStyleData3.HandColor = colorData7;
            clockHandStyleData3.HandStyle = DevComponents.DotNetBar.Controls.eHandStyles.Style2;
            clockHandStyleData3.Length = 0.8F;
            clockHandStyleData3.Width = 0.005F;
            clockStyleData1.SecondHandStyle = clockHandStyleData3;
            colorData8.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            colorData8.BorderWidth = 0.01F;
            colorData8.BrushSBSScale = 1F;
            colorData8.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData8.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            colorData8.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            clockStyleData1.SmallTickColor = colorData8;
            clockStyleData1.Style = DevComponents.DotNetBar.Controls.eClockStyles.Custom;
            this.clockControl9.ClockStyleData = clockStyleData1;
            this.clockControl9.IndicatorStyle = DevComponents.DotNetBar.Controls.eClockIndicatorStyles.Numbers;
            this.clockControl9.IsEditable = true;
            this.clockControl9.Location = new System.Drawing.Point(183, 27);
            this.clockControl9.Margin = new System.Windows.Forms.Padding(0);
            this.clockControl9.Name = "clockControl9";
            this.clockControl9.Size = new System.Drawing.Size(175, 175);
            this.clockControl9.TabIndex = 1125;
            this.clockControl9.Text = "clockControl9";
            this.clockControl9.TimeZone = null;
            this.clockControl9.Value = new System.DateTime(2011, 3, 8, 13, 32, 8, 266);
            // 
            // panel5
            // 
            this.panel5.BackColor = System.Drawing.Color.Blue;
            this.panel5.Controls.Add(this.lblhour);
            this.panel5.Controls.Add(this.lblyear);
            this.panel5.Controls.Add(this.lblday);
            this.panel5.Controls.Add(this.lblmonth);
            this.panel5.Controls.Add(this.lbldate);
            this.panel5.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel5.Location = new System.Drawing.Point(23, 23);
            this.panel5.Name = "panel5";
            this.panel5.Size = new System.Drawing.Size(137, 183);
            this.panel5.TabIndex = 1126;
            // 
            // lblhour
            // 
            this.lblhour.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblhour.ForeColor = System.Drawing.Color.Black;
            this.lblhour.Location = new System.Drawing.Point(45, 50);
            this.lblhour.Name = "lblhour";
            this.lblhour.Size = new System.Drawing.Size(96, 41);
            this.lblhour.TabIndex = 594;
            this.lblhour.Text = "Hour";
            this.lblhour.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblyear
            // 
            this.lblyear.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblyear.ForeColor = System.Drawing.Color.Black;
            this.lblyear.Location = new System.Drawing.Point(20, 185);
            this.lblyear.Name = "lblyear";
            this.lblyear.Size = new System.Drawing.Size(148, 33);
            this.lblyear.TabIndex = 592;
            this.lblyear.Text = "Year";
            this.lblyear.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblday
            // 
            this.lblday.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblday.ForeColor = System.Drawing.Color.Black;
            this.lblday.Location = new System.Drawing.Point(45, 9);
            this.lblday.Name = "lblday";
            this.lblday.Size = new System.Drawing.Size(96, 41);
            this.lblday.TabIndex = 593;
            this.lblday.Text = "Day";
            this.lblday.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblmonth
            // 
            this.lblmonth.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblmonth.ForeColor = System.Drawing.Color.Black;
            this.lblmonth.Location = new System.Drawing.Point(20, 122);
            this.lblmonth.Name = "lblmonth";
            this.lblmonth.Size = new System.Drawing.Size(142, 23);
            this.lblmonth.TabIndex = 591;
            this.lblmonth.Text = "Month";
            this.lblmonth.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lbldate
            // 
            this.lbldate.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lbldate.ForeColor = System.Drawing.Color.Black;
            this.lbldate.Location = new System.Drawing.Point(20, 145);
            this.lbldate.Name = "lbldate";
            this.lbldate.Size = new System.Drawing.Size(148, 30);
            this.lbldate.TabIndex = 590;
            this.lbldate.Text = "Date";
            this.lbldate.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // panel4
            // 
            this.panel4.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(192)))), ((int)(((byte)(192)))));
            this.panel4.Controls.Add(this.txtEmpID);
            this.panel4.Controls.Add(this.pic2);
            this.panel4.Controls.Add(this.Label2);
            this.panel4.Controls.Add(this.lblname);
            this.panel4.Controls.Add(this.lblEmpID);
            this.panel4.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel4.Location = new System.Drawing.Point(3, 238);
            this.panel4.Name = "panel4";
            this.panel4.Size = new System.Drawing.Size(378, 229);
            this.panel4.TabIndex = 1127;
            // 
            // txtEmpID
            // 
            this.txtEmpID.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.txtEmpID.Font = new System.Drawing.Font("Microsoft Sans Serif", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtEmpID.Location = new System.Drawing.Point(191, 182);
            this.txtEmpID.MaxLength = 10;
            this.txtEmpID.Name = "txtEmpID";
            this.txtEmpID.Size = new System.Drawing.Size(144, 30);
            this.txtEmpID.TabIndex = 1134;
            this.txtEmpID.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            this.txtEmpID.TextChanged += new System.EventHandler(this.txtEmpID_TextChanged);
            // 
            // pic2
            // 
            this.pic2.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.pic2.BackColor = System.Drawing.SystemColors.Control;
            this.pic2.Location = new System.Drawing.Point(26, 45);
            this.pic2.Name = "pic2";
            this.pic2.Size = new System.Drawing.Size(115, 115);
            this.pic2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pic2.TabIndex = 1133;
            this.pic2.TabStop = false;
            // 
            // Label2
            // 
            this.Label2.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.Label2.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold);
            this.Label2.ForeColor = System.Drawing.Color.Indigo;
            this.Label2.Location = new System.Drawing.Point(151, 121);
            this.Label2.Name = "Label2";
            this.Label2.Size = new System.Drawing.Size(206, 53);
            this.Label2.TabIndex = 1132;
            this.Label2.Text = "SCAN YOUR ID HERE";
            this.Label2.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblname
            // 
            this.lblname.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.lblname.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold);
            this.lblname.ForeColor = System.Drawing.Color.Fuchsia;
            this.lblname.Location = new System.Drawing.Point(155, 64);
            this.lblname.Name = "lblname";
            this.lblname.Size = new System.Drawing.Size(202, 30);
            this.lblname.TabIndex = 1131;
            this.lblname.Text = "INFORMATION";
            this.lblname.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblEmpID
            // 
            this.lblEmpID.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.lblEmpID.BackColor = System.Drawing.Color.Transparent;
            this.lblEmpID.Font = new System.Drawing.Font("Calibri", 9F, System.Drawing.FontStyle.Bold);
            this.lblEmpID.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(128)))), ((int)(((byte)(0)))));
            this.lblEmpID.Location = new System.Drawing.Point(159, 17);
            this.lblEmpID.Name = "lblEmpID";
            this.lblEmpID.Size = new System.Drawing.Size(198, 30);
            this.lblEmpID.TabIndex = 1130;
            this.lblEmpID.Text = "ID";
            this.lblEmpID.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            this.lblEmpID.Visible = false;
            // 
            // timer1
            // 
            this.timer1.Enabled = true;
            this.timer1.Tick += new System.EventHandler(this.timer1_Tick);
            // 
            // Timer3
            // 
            this.Timer3.Interval = 500;
            this.Timer3.Tick += new System.EventHandler(this.Timer3_Tick);
            // 
            // FormMain
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1058, 657);
            this.Controls.Add(this.tableLayoutPanel1);
            this.Name = "FormMain";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Face Recognition";
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.Load += new System.EventHandler(this.FrmPrincipal_Load);
            this.tableLayoutPanel1.ResumeLayout(false);
            this.tableLayoutPanel2.ResumeLayout(false);
            this.tableLayoutPanel2.PerformLayout();
            this.tableLayoutPanel3.ResumeLayout(false);
            this.tableLayoutPanel4.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.imageBoxFrameGrabber)).EndInit();
            this.tableLayoutPanel5.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.imageBox1)).EndInit();
            this.tableLayoutPanel6.ResumeLayout(false);
            this.tableLayoutPanel7.ResumeLayout(false);
            this.tableLayoutPanel8.ResumeLayout(false);
            this.panel5.ResumeLayout(false);
            this.panel4.ResumeLayout(false);
            this.panel4.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pic2)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel1;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel2;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel3;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel4;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel5;
        private Emgu.CV.UI.ImageBox imageBox1;
        private System.Windows.Forms.Button btnRegisterFace;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel7;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel8;
        private DevComponents.DotNetBar.Controls.AnalogClockControl clockControl9;
        private System.Windows.Forms.Panel panel4;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel6;
        private System.Windows.Forms.Panel panel5;
        internal System.Windows.Forms.Label lblhour;
        internal System.Windows.Forms.Label lblyear;
        internal System.Windows.Forms.Label lblday;
        internal System.Windows.Forms.Label lblmonth;
        internal System.Windows.Forms.Label lbldate;
        private System.Windows.Forms.Label label1;
        internal System.Windows.Forms.Label lblEmpID;
        internal System.Windows.Forms.Label lblname;
        internal System.Windows.Forms.Label Label2;
        internal System.Windows.Forms.PictureBox pic2;
        private System.Windows.Forms.Timer timer1;
        internal System.Windows.Forms.Timer Timer3;
        internal System.Windows.Forms.TextBox txtEmpID;
        private Emgu.CV.UI.ImageBox imageBoxFrameGrabber;
        private System.Windows.Forms.Button btnCapture;
    }
}