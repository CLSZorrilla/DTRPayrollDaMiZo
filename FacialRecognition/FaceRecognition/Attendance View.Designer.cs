namespace FaceRecognition
{
    partial class Form1
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
            this.auditTrail = new System.Windows.Forms.DataGridView();
            ((System.ComponentModel.ISupportInitialize)(this.auditTrail)).BeginInit();
            this.SuspendLayout();
            // 
            // auditTrail
            // 
            this.auditTrail.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.DisplayedCells;
            this.auditTrail.AutoSizeRowsMode = System.Windows.Forms.DataGridViewAutoSizeRowsMode.DisplayedCells;
            this.auditTrail.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.auditTrail.Dock = System.Windows.Forms.DockStyle.Fill;
            this.auditTrail.Location = new System.Drawing.Point(0, 0);
            this.auditTrail.Name = "auditTrail";
            this.auditTrail.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.auditTrail.Size = new System.Drawing.Size(889, 452);
            this.auditTrail.TabIndex = 1;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(889, 452);
            this.Controls.Add(this.auditTrail);
            this.Name = "Form1";
            this.Text = "Attendance Table";
            ((System.ComponentModel.ISupportInitialize)(this.auditTrail)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.DataGridView auditTrail;


    }
}