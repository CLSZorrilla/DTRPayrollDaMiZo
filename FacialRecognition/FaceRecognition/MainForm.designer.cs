namespace FaceRecognition
{
    partial class FaceDetect
    {
        /// <summary>
        /// Variable del diseñador requerida.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpiar los recursos que se estén utilizando.
        /// </summary>
        /// <param name="disposing">true si los recursos administrados se deben eliminar; false en caso contrario, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código generado por el Diseñador de Windows Forms

        /// <summary>
        /// Método necesario para admitir el Diseñador. No se puede modificar
        /// el contenido del método con el editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FaceDetect));
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
            this.timer1 = new System.Windows.Forms.Timer(this.components);
            this.grp1 = new DevComponents.DotNetBar.Controls.GroupPanel();
            this.lblname = new System.Windows.Forms.Label();
            this.PanelEx1 = new DevComponents.DotNetBar.PanelEx();
            this.lblmonth = new System.Windows.Forms.Label();
            this.lbldate = new System.Windows.Forms.Label();
            this.lblyear = new System.Windows.Forms.Label();
            this.lblday = new System.Windows.Forms.Label();
            this.lblhour = new System.Windows.Forms.Label();
            this.PictureBox2 = new System.Windows.Forms.PictureBox();
            this.Label2 = new System.Windows.Forms.Label();
            this.txtEmpID = new System.Windows.Forms.TextBox();
            this.PictureBox1 = new System.Windows.Forms.PictureBox();
            this.lblEmpID = new System.Windows.Forms.Label();
            this.groupPanel1 = new DevComponents.DotNetBar.Controls.GroupPanel();
            this.clockControl9 = new DevComponents.DotNetBar.Controls.AnalogClockControl();
            this.imageBoxFrameGrabber = new Emgu.CV.UI.ImageBox();
            this.pic2 = new System.Windows.Forms.PictureBox();
            this.imageBox1 = new Emgu.CV.UI.ImageBox();
            this.Panel3 = new System.Windows.Forms.Panel();
            this.LabelX1 = new DevComponents.DotNetBar.LabelX();
            this.Timer3 = new System.Windows.Forms.Timer(this.components);
            this.panel1 = new System.Windows.Forms.Panel();
            this.listView1 = new System.Windows.Forms.ListView();
            this.columnHeader1 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader2 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader3 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader4 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.columnHeader5 = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            this.btnRegisterFace = new System.Windows.Forms.Button();
            this.btnCapture = new System.Windows.Forms.Button();
            this.grp1.SuspendLayout();
            this.PanelEx1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBox2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBox1)).BeginInit();
            this.groupPanel1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.imageBoxFrameGrabber)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pic2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.imageBox1)).BeginInit();
            this.Panel3.SuspendLayout();
            this.panel1.SuspendLayout();
            this.SuspendLayout();
            // 
            // timer1
            // 
            this.timer1.Enabled = true;
            this.timer1.Tick += new System.EventHandler(this.timer1_Tick);
            // 
            // grp1
            // 
            this.grp1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.grp1.BackColor = System.Drawing.Color.Transparent;
            this.grp1.CanvasColor = System.Drawing.SystemColors.Control;
            this.grp1.ColorSchemeStyle = DevComponents.DotNetBar.eDotNetBarStyle.Office2007;
            this.grp1.Controls.Add(this.lblname);
            this.grp1.Controls.Add(this.PanelEx1);
            this.grp1.Controls.Add(this.PictureBox2);
            this.grp1.Controls.Add(this.Label2);
            this.grp1.Controls.Add(this.txtEmpID);
            this.grp1.Location = new System.Drawing.Point(50, 470);
            this.grp1.Name = "grp1";
            this.grp1.Size = new System.Drawing.Size(944, 245);
            // 
            // 
            // 
            this.grp1.Style.BackColor2SchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBackground2;
            this.grp1.Style.BackColorGradientAngle = 90;
            this.grp1.Style.BackColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBackground;
            this.grp1.Style.BorderBottom = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.grp1.Style.BorderBottomWidth = 1;
            this.grp1.Style.BorderColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBorder;
            this.grp1.Style.BorderLeft = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.grp1.Style.BorderLeftWidth = 1;
            this.grp1.Style.BorderRight = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.grp1.Style.BorderRightWidth = 1;
            this.grp1.Style.BorderTop = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.grp1.Style.BorderTopWidth = 1;
            this.grp1.Style.Class = "";
            this.grp1.Style.CornerDiameter = 4;
            this.grp1.Style.CornerType = DevComponents.DotNetBar.eCornerType.Rounded;
            this.grp1.Style.TextAlignment = DevComponents.DotNetBar.eStyleTextAlignment.Center;
            this.grp1.Style.TextColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelText;
            this.grp1.Style.TextLineAlignment = DevComponents.DotNetBar.eStyleTextAlignment.Near;
            // 
            // 
            // 
            this.grp1.StyleMouseDown.Class = "";
            this.grp1.StyleMouseDown.CornerType = DevComponents.DotNetBar.eCornerType.Square;
            // 
            // 
            // 
            this.grp1.StyleMouseOver.Class = "";
            this.grp1.StyleMouseOver.CornerType = DevComponents.DotNetBar.eCornerType.Square;
            this.grp1.TabIndex = 1113;
            // 
            // lblname
            // 
            this.lblname.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.lblname.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold);
            this.lblname.ForeColor = System.Drawing.Color.Fuchsia;
            this.lblname.Location = new System.Drawing.Point(569, 62);
            this.lblname.Name = "lblname";
            this.lblname.Size = new System.Drawing.Size(344, 30);
            this.lblname.TabIndex = 1127;
            this.lblname.Text = "INFORMATION";
            this.lblname.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // PanelEx1
            // 
            this.PanelEx1.CanvasColor = System.Drawing.SystemColors.Control;
            this.PanelEx1.ColorSchemeStyle = DevComponents.DotNetBar.eDotNetBarStyle.StyleManagerControlled;
            this.PanelEx1.Controls.Add(this.lblmonth);
            this.PanelEx1.Controls.Add(this.lbldate);
            this.PanelEx1.Controls.Add(this.lblyear);
            this.PanelEx1.Controls.Add(this.lblday);
            this.PanelEx1.Controls.Add(this.lblhour);
            this.PanelEx1.Location = new System.Drawing.Point(25, 25);
            this.PanelEx1.Name = "PanelEx1";
            this.PanelEx1.Size = new System.Drawing.Size(515, 188);
            this.PanelEx1.Style.Alignment = System.Drawing.StringAlignment.Center;
            this.PanelEx1.Style.BackColor1.ColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBackground;
            this.PanelEx1.Style.BackColor2.ColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBackground2;
            this.PanelEx1.Style.Border = DevComponents.DotNetBar.eBorderType.SingleLine;
            this.PanelEx1.Style.BorderColor.ColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBorder;
            this.PanelEx1.Style.ForeColor.ColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelText;
            this.PanelEx1.Style.GradientAngle = 90;
            this.PanelEx1.TabIndex = 1125;
            // 
            // lblmonth
            // 
            this.lblmonth.Font = new System.Drawing.Font("Calibri", 30F, System.Drawing.FontStyle.Bold);
            this.lblmonth.ForeColor = System.Drawing.Color.Black;
            this.lblmonth.Location = new System.Drawing.Point(258, 16);
            this.lblmonth.Name = "lblmonth";
            this.lblmonth.Size = new System.Drawing.Size(250, 49);
            this.lblmonth.TabIndex = 586;
            this.lblmonth.Text = "Month";
            this.lblmonth.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lbldate
            // 
            this.lbldate.Font = new System.Drawing.Font("Calibri", 45F, System.Drawing.FontStyle.Bold);
            this.lbldate.ForeColor = System.Drawing.Color.Black;
            this.lbldate.Location = new System.Drawing.Point(252, 63);
            this.lbldate.Name = "lbldate";
            this.lbldate.Size = new System.Drawing.Size(256, 73);
            this.lbldate.TabIndex = 585;
            this.lbldate.Text = "Date";
            this.lbldate.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblyear
            // 
            this.lblyear.Font = new System.Drawing.Font("Calibri", 20F, System.Drawing.FontStyle.Bold);
            this.lblyear.ForeColor = System.Drawing.Color.Black;
            this.lblyear.Location = new System.Drawing.Point(252, 143);
            this.lblyear.Name = "lblyear";
            this.lblyear.Size = new System.Drawing.Size(256, 33);
            this.lblyear.TabIndex = 587;
            this.lblyear.Text = "Year";
            this.lblyear.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblday
            // 
            this.lblday.Font = new System.Drawing.Font("Calibri", 25F, System.Drawing.FontStyle.Bold);
            this.lblday.ForeColor = System.Drawing.Color.Black;
            this.lblday.Location = new System.Drawing.Point(6, 49);
            this.lblday.Name = "lblday";
            this.lblday.Size = new System.Drawing.Size(204, 41);
            this.lblday.TabIndex = 588;
            this.lblday.Text = "Day";
            this.lblday.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // lblhour
            // 
            this.lblhour.Font = new System.Drawing.Font("Calibri", 25F, System.Drawing.FontStyle.Bold);
            this.lblhour.ForeColor = System.Drawing.Color.Black;
            this.lblhour.Location = new System.Drawing.Point(6, 99);
            this.lblhour.Name = "lblhour";
            this.lblhour.Size = new System.Drawing.Size(204, 41);
            this.lblhour.TabIndex = 589;
            this.lblhour.Text = "Hour";
            this.lblhour.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // PictureBox2
            // 
            this.PictureBox2.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.PictureBox2.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.PictureBox2.Image = ((System.Drawing.Image)(resources.GetObject("PictureBox2.Image")));
            this.PictureBox2.Location = new System.Drawing.Point(570, 111);
            this.PictureBox2.Name = "PictureBox2";
            this.PictureBox2.Size = new System.Drawing.Size(63, 50);
            this.PictureBox2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.PictureBox2.TabIndex = 1123;
            this.PictureBox2.TabStop = false;
            // 
            // Label2
            // 
            this.Label2.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.Label2.Font = new System.Drawing.Font("Calibri", 15F, System.Drawing.FontStyle.Bold);
            this.Label2.ForeColor = System.Drawing.Color.Indigo;
            this.Label2.Location = new System.Drawing.Point(639, 111);
            this.Label2.Name = "Label2";
            this.Label2.Size = new System.Drawing.Size(206, 53);
            this.Label2.TabIndex = 1121;
            this.Label2.Text = "SCAN YOUR ID HERE";
            this.Label2.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // txtEmpID
            // 
            this.txtEmpID.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.txtEmpID.Font = new System.Drawing.Font("Microsoft Sans Serif", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtEmpID.Location = new System.Drawing.Point(570, 176);
            this.txtEmpID.MaxLength = 10;
            this.txtEmpID.Name = "txtEmpID";
            this.txtEmpID.Size = new System.Drawing.Size(344, 30);
            this.txtEmpID.TabIndex = 0;
            this.txtEmpID.TextAlign = System.Windows.Forms.HorizontalAlignment.Center;
            this.txtEmpID.TextChanged += new System.EventHandler(this.txtEmpID_TextChanged);
            // 
            // PictureBox1
            // 
            this.PictureBox1.Anchor = System.Windows.Forms.AnchorStyles.Right;
            this.PictureBox1.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.PictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("PictureBox1.Image")));
            this.PictureBox1.Location = new System.Drawing.Point(907, 587);
            this.PictureBox1.Name = "PictureBox1";
            this.PictureBox1.Size = new System.Drawing.Size(63, 50);
            this.PictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.PictureBox1.TabIndex = 1122;
            this.PictureBox1.TabStop = false;
            // 
            // lblEmpID
            // 
            this.lblEmpID.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.lblEmpID.BackColor = System.Drawing.Color.Transparent;
            this.lblEmpID.Font = new System.Drawing.Font("Calibri", 9F, System.Drawing.FontStyle.Bold);
            this.lblEmpID.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(128)))), ((int)(((byte)(0)))));
            this.lblEmpID.Location = new System.Drawing.Point(637, 499);
            this.lblEmpID.Name = "lblEmpID";
            this.lblEmpID.Size = new System.Drawing.Size(346, 30);
            this.lblEmpID.TabIndex = 1129;
            this.lblEmpID.Text = "ID";
            this.lblEmpID.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            this.lblEmpID.Visible = false;
            // 
            // groupPanel1
            // 
            this.groupPanel1.CanvasColor = System.Drawing.SystemColors.Control;
            this.groupPanel1.ColorSchemeStyle = DevComponents.DotNetBar.eDotNetBarStyle.OfficeXP;
            this.groupPanel1.Controls.Add(this.clockControl9);
            this.groupPanel1.Controls.Add(this.grp1);
            this.groupPanel1.Controls.Add(this.imageBoxFrameGrabber);
            this.groupPanel1.Controls.Add(this.pic2);
            this.groupPanel1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.groupPanel1.Location = new System.Drawing.Point(0, 0);
            this.groupPanel1.Name = "groupPanel1";
            this.groupPanel1.Size = new System.Drawing.Size(1075, 733);
            // 
            // 
            // 
            this.groupPanel1.Style.BackColor2SchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBackground2;
            this.groupPanel1.Style.BackColorGradientAngle = 90;
            this.groupPanel1.Style.BackColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBackground;
            this.groupPanel1.Style.BorderBottom = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.groupPanel1.Style.BorderBottomWidth = 1;
            this.groupPanel1.Style.BorderColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelBorder;
            this.groupPanel1.Style.BorderLeft = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.groupPanel1.Style.BorderLeftWidth = 1;
            this.groupPanel1.Style.BorderRight = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.groupPanel1.Style.BorderRightWidth = 1;
            this.groupPanel1.Style.BorderTop = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.groupPanel1.Style.BorderTopWidth = 1;
            this.groupPanel1.Style.Class = "";
            this.groupPanel1.Style.CornerDiameter = 4;
            this.groupPanel1.Style.CornerType = DevComponents.DotNetBar.eCornerType.Rounded;
            this.groupPanel1.Style.TextAlignment = DevComponents.DotNetBar.eStyleTextAlignment.Center;
            this.groupPanel1.Style.TextColorSchemePart = DevComponents.DotNetBar.eColorSchemePart.PanelText;
            this.groupPanel1.Style.TextLineAlignment = DevComponents.DotNetBar.eStyleTextAlignment.Near;
            // 
            // 
            // 
            this.groupPanel1.StyleMouseDown.Class = "";
            this.groupPanel1.StyleMouseDown.CornerType = DevComponents.DotNetBar.eCornerType.Square;
            // 
            // 
            // 
            this.groupPanel1.StyleMouseOver.Class = "";
            this.groupPanel1.StyleMouseOver.CornerType = DevComponents.DotNetBar.eCornerType.Square;
            this.groupPanel1.TabIndex = 1116;
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
            this.clockControl9.Location = new System.Drawing.Point(425, 64);
            this.clockControl9.Name = "clockControl9";
            this.clockControl9.Size = new System.Drawing.Size(217, 217);
            this.clockControl9.TabIndex = 1124;
            this.clockControl9.Text = "clockControl9";
            this.clockControl9.TimeZone = null;
            this.clockControl9.Value = new System.DateTime(2011, 3, 8, 13, 32, 8, 266);
            // 
            // imageBoxFrameGrabber
            // 
            this.imageBoxFrameGrabber.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.imageBoxFrameGrabber.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.imageBoxFrameGrabber.Location = new System.Drawing.Point(646, 91);
            this.imageBoxFrameGrabber.Name = "imageBoxFrameGrabber";
            this.imageBoxFrameGrabber.Size = new System.Drawing.Size(350, 350);
            this.imageBoxFrameGrabber.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.imageBoxFrameGrabber.TabIndex = 4;
            this.imageBoxFrameGrabber.TabStop = false;
            // 
            // pic2
            // 
            this.pic2.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.pic2.Location = new System.Drawing.Point(449, 281);
            this.pic2.Name = "pic2";
            this.pic2.Size = new System.Drawing.Size(160, 160);
            this.pic2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pic2.TabIndex = 1120;
            this.pic2.TabStop = false;
            // 
            // imageBox1
            // 
            this.imageBox1.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.imageBox1.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.imageBox1.Location = new System.Drawing.Point(56, 94);
            this.imageBox1.Name = "imageBox1";
            this.imageBox1.Size = new System.Drawing.Size(350, 350);
            this.imageBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.imageBox1.TabIndex = 1126;
            this.imageBox1.TabStop = false;
            // 
            // Panel3
            // 
            this.Panel3.Controls.Add(this.LabelX1);
            this.Panel3.Dock = System.Windows.Forms.DockStyle.Top;
            this.Panel3.Location = new System.Drawing.Point(0, 0);
            this.Panel3.Name = "Panel3";
            this.Panel3.Size = new System.Drawing.Size(1075, 72);
            this.Panel3.TabIndex = 1117;
            // 
            // LabelX1
            // 
            this.LabelX1.BackColor = System.Drawing.Color.Transparent;
            // 
            // 
            // 
            this.LabelX1.BackgroundStyle.BackColor = System.Drawing.Color.White;
            this.LabelX1.BackgroundStyle.BackColor2 = System.Drawing.Color.WhiteSmoke;
            this.LabelX1.BackgroundStyle.BackColorGradientAngle = 90;
            this.LabelX1.BackgroundStyle.BorderBottom = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.LabelX1.BackgroundStyle.BorderBottomWidth = 3;
            this.LabelX1.BackgroundStyle.BorderColor = System.Drawing.Color.Maroon;
            this.LabelX1.BackgroundStyle.BorderLeft = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.LabelX1.BackgroundStyle.BorderLeftWidth = 3;
            this.LabelX1.BackgroundStyle.BorderRight = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.LabelX1.BackgroundStyle.BorderRightWidth = 3;
            this.LabelX1.BackgroundStyle.BorderTop = DevComponents.DotNetBar.eStyleBorderType.Solid;
            this.LabelX1.BackgroundStyle.BorderTopWidth = 3;
            this.LabelX1.BackgroundStyle.Class = "";
            this.LabelX1.BackgroundStyle.CornerType = DevComponents.DotNetBar.eCornerType.Square;
            this.LabelX1.BackgroundStyle.TextAlignment = DevComponents.DotNetBar.eStyleTextAlignment.Center;
            this.LabelX1.Dock = System.Windows.Forms.DockStyle.Top;
            this.LabelX1.Font = new System.Drawing.Font("Cooper Black", 26.25F);
            this.LabelX1.Location = new System.Drawing.Point(0, 0);
            this.LabelX1.Name = "LabelX1";
            this.LabelX1.Size = new System.Drawing.Size(1075, 70);
            this.LabelX1.Style = DevComponents.DotNetBar.eDotNetBarStyle.StyleManagerControlled;
            this.LabelX1.TabIndex = 1119;
            this.LabelX1.Text = "DAILY TIME IN / OUT FOR EMPLOYEE";
            this.LabelX1.TextAlignment = System.Drawing.StringAlignment.Center;
            // 
            // Timer3
            // 
            this.Timer3.Interval = 500;
            this.Timer3.Tick += new System.EventHandler(this.Timer3_Tick);
            // 
            // panel1
            // 
            this.panel1.Controls.Add(this.listView1);
            this.panel1.Dock = System.Windows.Forms.DockStyle.Left;
            this.panel1.Location = new System.Drawing.Point(0, 72);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(0, 661);
            this.panel1.TabIndex = 1130;
            // 
            // listView1
            // 
            this.listView1.BorderStyle = System.Windows.Forms.BorderStyle.None;
            this.listView1.Columns.AddRange(new System.Windows.Forms.ColumnHeader[] {
            this.columnHeader1,
            this.columnHeader2,
            this.columnHeader3,
            this.columnHeader4,
            this.columnHeader5});
            this.listView1.Dock = System.Windows.Forms.DockStyle.Fill;
            this.listView1.Location = new System.Drawing.Point(0, 0);
            this.listView1.Name = "listView1";
            this.listView1.Size = new System.Drawing.Size(0, 661);
            this.listView1.TabIndex = 0;
            this.listView1.UseCompatibleStateImageBehavior = false;
            this.listView1.View = System.Windows.Forms.View.Details;
            // 
            // columnHeader1
            // 
            this.columnHeader1.Text = "Name";
            this.columnHeader1.Width = 143;
            // 
            // columnHeader2
            // 
            this.columnHeader2.Text = "AM_In";
            // 
            // columnHeader3
            // 
            this.columnHeader3.Text = "AM_Out";
            // 
            // columnHeader4
            // 
            this.columnHeader4.Text = "PM_In";
            // 
            // columnHeader5
            // 
            this.columnHeader5.Text = "PM_Out";
            // 
            // btnRegisterFace
            // 
            this.btnRegisterFace.Location = new System.Drawing.Point(898, 73);
            this.btnRegisterFace.Name = "btnRegisterFace";
            this.btnRegisterFace.Size = new System.Drawing.Size(101, 23);
            this.btnRegisterFace.TabIndex = 1131;
            this.btnRegisterFace.Text = "Register Face";
            this.btnRegisterFace.UseVisualStyleBackColor = true;
            this.btnRegisterFace.Click += new System.EventHandler(this.btnRegisterFace_Click);
            // 
            // btnCapture
            // 
            this.btnCapture.Location = new System.Drawing.Point(745, 445);
            this.btnCapture.Name = "btnCapture";
            this.btnCapture.Size = new System.Drawing.Size(181, 21);
            this.btnCapture.TabIndex = 1132;
            this.btnCapture.Text = "Capture!";
            this.btnCapture.UseVisualStyleBackColor = true;
            this.btnCapture.Click += new System.EventHandler(this.btnCapture_Click);
            // 
            // FaceDetect
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1075, 733);
            this.Controls.Add(this.btnCapture);
            this.Controls.Add(this.btnRegisterFace);
            this.Controls.Add(this.panel1);
            this.Controls.Add(this.PictureBox1);
            this.Controls.Add(this.imageBox1);
            this.Controls.Add(this.lblEmpID);
            this.Controls.Add(this.Panel3);
            this.Controls.Add(this.groupPanel1);
            this.KeyPreview = true;
            this.Name = "FaceDetect";
            this.Text = "Face Recognition";
            this.WindowState = System.Windows.Forms.FormWindowState.Maximized;
            this.Load += new System.EventHandler(this.FrmPrincipal_Load);
            this.grp1.ResumeLayout(false);
            this.grp1.PerformLayout();
            this.PanelEx1.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.PictureBox2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.PictureBox1)).EndInit();
            this.groupPanel1.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.imageBoxFrameGrabber)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pic2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.imageBox1)).EndInit();
            this.Panel3.ResumeLayout(false);
            this.panel1.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private Emgu.CV.UI.ImageBox imageBoxFrameGrabber;
        private System.Windows.Forms.Timer timer1;
        internal System.Windows.Forms.Panel Panel3;
        internal System.Windows.Forms.PictureBox PictureBox2;
        internal System.Windows.Forms.PictureBox PictureBox1;
        internal System.Windows.Forms.Label Label2;
        internal System.Windows.Forms.PictureBox pic2;
        internal System.Windows.Forms.TextBox txtEmpID;
        private DevComponents.DotNetBar.Controls.AnalogClockControl clockControl9;
        internal System.Windows.Forms.Timer Timer3;
        internal System.Windows.Forms.Label lblmonth;
        internal System.Windows.Forms.Label lbldate;
        internal System.Windows.Forms.Label lblyear;
        internal System.Windows.Forms.Label lblday;
        internal System.Windows.Forms.Label lblhour;
        internal System.Windows.Forms.Label lblname;
        internal System.Windows.Forms.Label lblEmpID;
        private Emgu.CV.UI.ImageBox imageBox1;
        private DevComponents.DotNetBar.Controls.GroupPanel grp1;
        private DevComponents.DotNetBar.Controls.GroupPanel groupPanel1;
        private DevComponents.DotNetBar.LabelX LabelX1;
        private DevComponents.DotNetBar.PanelEx PanelEx1;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.ListView listView1;
        private System.Windows.Forms.ColumnHeader columnHeader1;
        private System.Windows.Forms.ColumnHeader columnHeader2;
        private System.Windows.Forms.ColumnHeader columnHeader3;
        private System.Windows.Forms.ColumnHeader columnHeader4;
        private System.Windows.Forms.ColumnHeader columnHeader5;
        private System.Windows.Forms.Button btnRegisterFace;
        private System.Windows.Forms.Button btnCapture;
    }
}

