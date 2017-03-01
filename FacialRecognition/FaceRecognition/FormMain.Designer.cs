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
            DevComponents.DotNetBar.Controls.ClockStyleData clockStyleData2 = new DevComponents.DotNetBar.Controls.ClockStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData9 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData10 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData11 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ClockHandStyleData clockHandStyleData4 = new DevComponents.DotNetBar.Controls.ClockHandStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData12 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData13 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ClockHandStyleData clockHandStyleData5 = new DevComponents.DotNetBar.Controls.ClockHandStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData14 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ClockHandStyleData clockHandStyleData6 = new DevComponents.DotNetBar.Controls.ClockHandStyleData();
            DevComponents.DotNetBar.Controls.ColorData colorData15 = new DevComponents.DotNetBar.Controls.ColorData();
            DevComponents.DotNetBar.Controls.ColorData colorData16 = new DevComponents.DotNetBar.Controls.ColorData();
            this.tableLayoutPanel1 = new System.Windows.Forms.TableLayoutPanel();
            this.panel1 = new System.Windows.Forms.Panel();
            this.tableLayoutPanel2 = new System.Windows.Forms.TableLayoutPanel();
            this.company_name = new System.Windows.Forms.Label();
            this.picLogo = new System.Windows.Forms.PictureBox();
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
            this.tableLayoutPanel10 = new System.Windows.Forms.TableLayoutPanel();
            this.panel5 = new System.Windows.Forms.Panel();
            this.lblday = new System.Windows.Forms.Label();
            this.lblhour = new System.Windows.Forms.Label();
            this.panel6 = new System.Windows.Forms.Panel();
            this.lblmonth = new System.Windows.Forms.Label();
            this.lbldate = new System.Windows.Forms.Label();
            this.lblyear = new System.Windows.Forms.Label();
            this.tableLayoutPanel9 = new System.Windows.Forms.TableLayoutPanel();
            this._picture = new System.Windows.Forms.PictureBox();
            this.panel4 = new System.Windows.Forms.Panel();
            this.txtEmpID = new System.Windows.Forms.TextBox();
            this.lblname = new System.Windows.Forms.Label();
            this.Label2 = new System.Windows.Forms.Label();
            this.lblEmpID = new System.Windows.Forms.Label();
            this.timer1 = new System.Windows.Forms.Timer(this.components);
            this.Timer3 = new System.Windows.Forms.Timer(this.components);
            this.tableLayoutPanel1.SuspendLayout();
            this.tableLayoutPanel2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.picLogo)).BeginInit();
            this.tableLayoutPanel3.SuspendLayout();
            this.tableLayoutPanel4.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.imageBoxFrameGrabber)).BeginInit();
            this.tableLayoutPanel5.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.imageBox1)).BeginInit();
            this.tableLayoutPanel6.SuspendLayout();
            this.tableLayoutPanel7.SuspendLayout();
            this.tableLayoutPanel8.SuspendLayout();
            this.tableLayoutPanel10.SuspendLayout();
            this.panel5.SuspendLayout();
            this.panel6.SuspendLayout();
            this.tableLayoutPanel9.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this._picture)).BeginInit();
            this.panel4.SuspendLayout();
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
            this.panel1.BackColor = System.Drawing.Color.Black;
            this.panel1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel1.Location = new System.Drawing.Point(3, 58);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(1052, 14);
            this.panel1.TabIndex = 0;
            // 
            // tableLayoutPanel2
            // 
            this.tableLayoutPanel2.ColumnCount = 3;
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 15F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 50F));
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle());
            this.tableLayoutPanel2.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel2.Controls.Add(this.company_name, 2, 0);
            this.tableLayoutPanel2.Controls.Add(this.picLogo, 1, 0);
            this.tableLayoutPanel2.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel2.Location = new System.Drawing.Point(3, 3);
            this.tableLayoutPanel2.Name = "tableLayoutPanel2";
            this.tableLayoutPanel2.RowCount = 1;
            this.tableLayoutPanel2.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel2.Size = new System.Drawing.Size(1052, 49);
            this.tableLayoutPanel2.TabIndex = 1;
            // 
            // company_name
            // 
            this.company_name.Anchor = System.Windows.Forms.AnchorStyles.Left;
            this.company_name.Font = new System.Drawing.Font("Arial", 20.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.company_name.Location = new System.Drawing.Point(68, 8);
            this.company_name.Name = "company_name";
            this.company_name.Size = new System.Drawing.Size(975, 32);
            this.company_name.TabIndex = 3;
            this.company_name.Text = "\"Company Name\"";
            // 
            // picLogo
            // 
            this.picLogo.BackColor = System.Drawing.Color.White;
            this.picLogo.Dock = System.Windows.Forms.DockStyle.Fill;
            this.picLogo.Location = new System.Drawing.Point(18, 3);
            this.picLogo.Name = "picLogo";
            this.picLogo.Size = new System.Drawing.Size(44, 43);
            this.picLogo.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.picLogo.TabIndex = 1134;
            this.picLogo.TabStop = false;
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
            this.tableLayoutPanel4.BackColor = System.Drawing.Color.Gainsboro;
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
            this.btnCapture.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.btnCapture.Location = new System.Drawing.Point(45, 3);
            this.btnCapture.Name = "btnCapture";
            this.btnCapture.Size = new System.Drawing.Size(101, 45);
            this.btnCapture.TabIndex = 1133;
            this.btnCapture.Text = "Capture";
            this.btnCapture.UseVisualStyleBackColor = true;
            this.btnCapture.Click += new System.EventHandler(this.btnCapture_Click);
            // 
            // tableLayoutPanel7
            // 
            this.tableLayoutPanel7.ColumnCount = 1;
            this.tableLayoutPanel7.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel7.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel7.Controls.Add(this.tableLayoutPanel8, 0, 0);
            this.tableLayoutPanel7.Controls.Add(this.tableLayoutPanel9, 0, 1);
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
            this.tableLayoutPanel8.BackColor = System.Drawing.Color.Gainsboro;
            this.tableLayoutPanel8.ColumnCount = 5;
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle());
            this.tableLayoutPanel8.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel8.Controls.Add(this.clockControl9, 3, 1);
            this.tableLayoutPanel8.Controls.Add(this.tableLayoutPanel10, 1, 1);
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
            this.clockControl9.BackColor = System.Drawing.Color.Transparent;
            this.clockControl9.ClockStyle = DevComponents.DotNetBar.Controls.eClockStyles.Custom;
            colorData9.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(120)))), ((int)(((byte)(120)))), ((int)(((byte)(120)))));
            colorData9.BorderWidth = 0.01F;
            colorData9.BrushSBSScale = 1F;
            colorData9.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData9.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            colorData9.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(152)))), ((int)(((byte)(152)))), ((int)(((byte)(152)))));
            clockStyleData2.BezelColor = colorData9;
            colorData10.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData10.BorderWidth = 0.01F;
            colorData10.BrushSBSScale = 1F;
            colorData10.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData10.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockStyleData2.CapColor = colorData10;
            colorData11.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(135)))), ((int)(((byte)(145)))), ((int)(((byte)(161)))));
            colorData11.BorderWidth = 0.01F;
            colorData11.BrushAngle = 45F;
            colorData11.BrushSBSScale = 1F;
            colorData11.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData11.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(191)))), ((int)(((byte)(204)))), ((int)(((byte)(213)))));
            colorData11.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            clockStyleData2.FaceColor = colorData11;
            clockStyleData2.GlassAngle = -20;
            colorData12.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData12.BorderWidth = 0.01F;
            colorData12.BrushSBSScale = 1F;
            colorData12.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData12.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockHandStyleData4.HandColor = colorData12;
            clockHandStyleData4.Length = 0.55F;
            clockHandStyleData4.Width = 0.015F;
            clockStyleData2.HourHandStyle = clockHandStyleData4;
            colorData13.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            colorData13.BorderWidth = 0.01F;
            colorData13.BrushSBSScale = 1F;
            colorData13.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData13.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            colorData13.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            clockStyleData2.LargeTickColor = colorData13;
            colorData14.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData14.BorderWidth = 0.01F;
            colorData14.BrushSBSScale = 1F;
            colorData14.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData14.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockHandStyleData5.HandColor = colorData14;
            clockHandStyleData5.Length = 0.8F;
            clockHandStyleData5.Width = 0.01F;
            clockStyleData2.MinuteHandStyle = clockHandStyleData5;
            clockStyleData2.NumberFont = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Pixel);
            colorData15.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData15.BorderWidth = 0.01F;
            colorData15.BrushSBSScale = 1F;
            colorData15.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            colorData15.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(109)))), ((int)(((byte)(127)))), ((int)(((byte)(138)))));
            clockHandStyleData6.HandColor = colorData15;
            clockHandStyleData6.HandStyle = DevComponents.DotNetBar.Controls.eHandStyles.Style2;
            clockHandStyleData6.Length = 0.8F;
            clockHandStyleData6.Width = 0.005F;
            clockStyleData2.SecondHandStyle = clockHandStyleData6;
            colorData16.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            colorData16.BorderWidth = 0.01F;
            colorData16.BrushSBSScale = 1F;
            colorData16.BrushType = DevComponents.DotNetBar.Controls.eBrushTypes.Linear;
            colorData16.Color1 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            colorData16.Color2 = System.Drawing.Color.FromArgb(((int)(((byte)(122)))), ((int)(((byte)(142)))), ((int)(((byte)(154)))));
            clockStyleData2.SmallTickColor = colorData16;
            clockStyleData2.Style = DevComponents.DotNetBar.Controls.eClockStyles.Custom;
            this.clockControl9.ClockStyleData = clockStyleData2;
            this.clockControl9.Dock = System.Windows.Forms.DockStyle.Fill;
            this.clockControl9.IndicatorStyle = DevComponents.DotNetBar.Controls.eClockIndicatorStyles.Numbers;
            this.clockControl9.IsEditable = true;
            this.clockControl9.Location = new System.Drawing.Point(169, 20);
            this.clockControl9.Margin = new System.Windows.Forms.Padding(0);
            this.clockControl9.Name = "clockControl9";
            this.clockControl9.Size = new System.Drawing.Size(189, 189);
            this.clockControl9.TabIndex = 1125;
            this.clockControl9.Text = "clockControl9";
            this.clockControl9.TimeZone = null;
            this.clockControl9.Value = new System.DateTime(2011, 3, 8, 13, 32, 8, 266);
            // 
            // tableLayoutPanel10
            // 
            this.tableLayoutPanel10.BackColor = System.Drawing.Color.WhiteSmoke;
            this.tableLayoutPanel10.ColumnCount = 2;
            this.tableLayoutPanel10.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 45F));
            this.tableLayoutPanel10.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 55F));
            this.tableLayoutPanel10.Controls.Add(this.panel5, 0, 0);
            this.tableLayoutPanel10.Controls.Add(this.panel6, 1, 0);
            this.tableLayoutPanel10.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel10.Location = new System.Drawing.Point(23, 23);
            this.tableLayoutPanel10.Name = "tableLayoutPanel10";
            this.tableLayoutPanel10.RowCount = 1;
            this.tableLayoutPanel10.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel10.Size = new System.Drawing.Size(123, 183);
            this.tableLayoutPanel10.TabIndex = 1126;
            // 
            // panel5
            // 
            this.panel5.Controls.Add(this.lblday);
            this.panel5.Controls.Add(this.lblhour);
            this.panel5.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel5.Location = new System.Drawing.Point(3, 3);
            this.panel5.Name = "panel5";
            this.panel5.Size = new System.Drawing.Size(49, 177);
            this.panel5.TabIndex = 0;
            // 
            // lblday
            // 
            this.lblday.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.lblday.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblday.ForeColor = System.Drawing.Color.Indigo;
            this.lblday.Location = new System.Drawing.Point(-33, 47);
            this.lblday.Name = "lblday";
            this.lblday.Size = new System.Drawing.Size(117, 41);
            this.lblday.TabIndex = 593;
            this.lblday.Text = "Day";
            this.lblday.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblhour
            // 
            this.lblhour.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.lblhour.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblhour.ForeColor = System.Drawing.Color.Indigo;
            this.lblhour.Location = new System.Drawing.Point(-33, 92);
            this.lblhour.Name = "lblhour";
            this.lblhour.Size = new System.Drawing.Size(117, 41);
            this.lblhour.TabIndex = 594;
            this.lblhour.Text = "Hour";
            this.lblhour.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // panel6
            // 
            this.panel6.Controls.Add(this.lblmonth);
            this.panel6.Controls.Add(this.lbldate);
            this.panel6.Controls.Add(this.lblyear);
            this.panel6.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel6.Location = new System.Drawing.Point(58, 3);
            this.panel6.Name = "panel6";
            this.panel6.Size = new System.Drawing.Size(62, 177);
            this.panel6.TabIndex = 1;
            // 
            // lblmonth
            // 
            this.lblmonth.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.lblmonth.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblmonth.ForeColor = System.Drawing.Color.Indigo;
            this.lblmonth.Location = new System.Drawing.Point(-21, 33);
            this.lblmonth.Name = "lblmonth";
            this.lblmonth.Size = new System.Drawing.Size(107, 23);
            this.lblmonth.TabIndex = 591;
            this.lblmonth.Text = "Month";
            this.lblmonth.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lbldate
            // 
            this.lbldate.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom)
                        | System.Windows.Forms.AnchorStyles.Left)
                        | System.Windows.Forms.AnchorStyles.Right)));
            this.lbldate.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lbldate.ForeColor = System.Drawing.Color.Indigo;
            this.lbldate.Location = new System.Drawing.Point(-23, 71);
            this.lbldate.Name = "lbldate";
            this.lbldate.Size = new System.Drawing.Size(109, 30);
            this.lbldate.TabIndex = 590;
            this.lbldate.Text = "Date";
            this.lbldate.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblyear
            // 
            this.lblyear.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.lblyear.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lblyear.ForeColor = System.Drawing.Color.Indigo;
            this.lblyear.Location = new System.Drawing.Point(-21, 111);
            this.lblyear.Name = "lblyear";
            this.lblyear.Size = new System.Drawing.Size(109, 33);
            this.lblyear.TabIndex = 592;
            this.lblyear.Text = "Year";
            this.lblyear.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // tableLayoutPanel9
            // 
            this.tableLayoutPanel9.BackColor = System.Drawing.Color.Gainsboro;
            this.tableLayoutPanel9.ColumnCount = 5;
            this.tableLayoutPanel9.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel9.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 152F));
            this.tableLayoutPanel9.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel9.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Percent, 100F));
            this.tableLayoutPanel9.ColumnStyles.Add(new System.Windows.Forms.ColumnStyle(System.Windows.Forms.SizeType.Absolute, 20F));
            this.tableLayoutPanel9.Controls.Add(this._picture, 1, 1);
            this.tableLayoutPanel9.Controls.Add(this.panel4, 3, 1);
            this.tableLayoutPanel9.Controls.Add(this.lblEmpID, 3, 0);
            this.tableLayoutPanel9.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tableLayoutPanel9.Location = new System.Drawing.Point(3, 238);
            this.tableLayoutPanel9.Name = "tableLayoutPanel9";
            this.tableLayoutPanel9.RowCount = 3;
            this.tableLayoutPanel9.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel9.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Absolute, 152F));
            this.tableLayoutPanel9.RowStyles.Add(new System.Windows.Forms.RowStyle(System.Windows.Forms.SizeType.Percent, 50F));
            this.tableLayoutPanel9.Size = new System.Drawing.Size(378, 229);
            this.tableLayoutPanel9.TabIndex = 1127;
            // 
            // _picture
            // 
            this._picture.BackColor = System.Drawing.SystemColors.Control;
            this._picture.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this._picture.Dock = System.Windows.Forms.DockStyle.Fill;
            this._picture.Location = new System.Drawing.Point(23, 41);
            this._picture.Name = "_picture";
            this._picture.Size = new System.Drawing.Size(146, 146);
            this._picture.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this._picture.TabIndex = 1133;
            this._picture.TabStop = false;
            // 
            // panel4
            // 
            this.panel4.Controls.Add(this.txtEmpID);
            this.panel4.Controls.Add(this.lblname);
            this.panel4.Controls.Add(this.Label2);
            this.panel4.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel4.Location = new System.Drawing.Point(195, 41);
            this.panel4.Name = "panel4";
            this.panel4.Size = new System.Drawing.Size(160, 146);
            this.panel4.TabIndex = 1134;
            // 
            // txtEmpID
            // 
            this.txtEmpID.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.txtEmpID.Font = new System.Drawing.Font("Microsoft Sans Serif", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtEmpID.Location = new System.Drawing.Point(9, 113);
            this.txtEmpID.MaxLength = 10;
            this.txtEmpID.Name = "txtEmpID";
            this.txtEmpID.Size = new System.Drawing.Size(144, 30);
            this.txtEmpID.TabIndex = 1134;
            this.txtEmpID.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            this.txtEmpID.TextChanged += new System.EventHandler(this.txtEmpID_TextChanged);
            // 
            // lblname
            // 
            this.lblname.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.lblname.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold);
            this.lblname.ForeColor = System.Drawing.Color.Fuchsia;
            this.lblname.Location = new System.Drawing.Point(-20, 0);
            this.lblname.Name = "lblname";
            this.lblname.Size = new System.Drawing.Size(202, 30);
            this.lblname.TabIndex = 1131;
            this.lblname.Text = "INFORMATION";
            this.lblname.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // Label2
            // 
            this.Label2.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom)
                        | System.Windows.Forms.AnchorStyles.Left)
                        | System.Windows.Forms.AnchorStyles.Right)));
            this.Label2.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold);
            this.Label2.ForeColor = System.Drawing.Color.Indigo;
            this.Label2.Location = new System.Drawing.Point(9, 46);
            this.Label2.Name = "Label2";
            this.Label2.Size = new System.Drawing.Size(144, 50);
            this.Label2.TabIndex = 1132;
            this.Label2.Text = "SCAN YOUR ID HERE";
            this.Label2.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblEmpID
            // 
            this.lblEmpID.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Left | System.Windows.Forms.AnchorStyles.Right)));
            this.lblEmpID.BackColor = System.Drawing.Color.Transparent;
            this.lblEmpID.Font = new System.Drawing.Font("Calibri", 9F, System.Drawing.FontStyle.Bold);
            this.lblEmpID.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(128)))), ((int)(((byte)(0)))));
            this.lblEmpID.Location = new System.Drawing.Point(195, 4);
            this.lblEmpID.Name = "lblEmpID";
            this.lblEmpID.Size = new System.Drawing.Size(160, 30);
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
            ((System.ComponentModel.ISupportInitialize)(this.picLogo)).EndInit();
            this.tableLayoutPanel3.ResumeLayout(false);
            this.tableLayoutPanel4.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.imageBoxFrameGrabber)).EndInit();
            this.tableLayoutPanel5.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.imageBox1)).EndInit();
            this.tableLayoutPanel6.ResumeLayout(false);
            this.tableLayoutPanel7.ResumeLayout(false);
            this.tableLayoutPanel8.ResumeLayout(false);
            this.tableLayoutPanel10.ResumeLayout(false);
            this.panel5.ResumeLayout(false);
            this.panel6.ResumeLayout(false);
            this.tableLayoutPanel9.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this._picture)).EndInit();
            this.panel4.ResumeLayout(false);
            this.panel4.PerformLayout();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel1;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel3;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel4;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel5;
        private Emgu.CV.UI.ImageBox imageBox1;
        private System.Windows.Forms.Button btnRegisterFace;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel7;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel8;
        private DevComponents.DotNetBar.Controls.AnalogClockControl clockControl9;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel6;
        internal System.Windows.Forms.Label lblhour;
        internal System.Windows.Forms.Label lblyear;
        internal System.Windows.Forms.Label lblday;
        internal System.Windows.Forms.Label lblmonth;
        internal System.Windows.Forms.Label lbldate;
        internal System.Windows.Forms.Label lblEmpID;
        internal System.Windows.Forms.Label lblname;
        internal System.Windows.Forms.Label Label2;
        internal System.Windows.Forms.PictureBox _picture;
        private System.Windows.Forms.Timer timer1;
        internal System.Windows.Forms.Timer Timer3;
        internal System.Windows.Forms.TextBox txtEmpID;
        private Emgu.CV.UI.ImageBox imageBoxFrameGrabber;
        private System.Windows.Forms.Button btnCapture;
        private System.Windows.Forms.Label company_name;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel9;
        private System.Windows.Forms.Panel panel4;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel10;
        private System.Windows.Forms.Panel panel5;
        private System.Windows.Forms.Panel panel6;
        private System.Windows.Forms.TableLayoutPanel tableLayoutPanel2;
        internal System.Windows.Forms.PictureBox picLogo;
    }
}