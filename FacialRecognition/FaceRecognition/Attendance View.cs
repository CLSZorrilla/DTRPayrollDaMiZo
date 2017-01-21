using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

using MySql.Data.MySqlClient;

namespace FaceRecognition
{
    public partial class Form1 : Form
    {
        private string conn;
        private MySqlConnection connect;
        private MySqlDataAdapter mySqlDataAdapter;
        private MySqlCommand cmd = new MySqlCommand();

        public Form1()
        {
            InitializeComponent();
            display_attendance();
        }

        private void db_connection()
        {
            try
            {
                conn = "Server=localhost; Database=payrolldb; Uid=root; Pwd=;";
                connect = new MySqlConnection(conn);
                connect.Open();
            }
            catch (MySqlException e)
            {
                MessageBox.Show("Database not connected!");
                throw e;
            }
        }


        private void display_attendance()
        {
            db_connection();

            mySqlDataAdapter = new MySqlDataAdapter("SELECT `AuditTrail_ID`, DATE_FORMAT(`DateTime`,'%Y-%m-%d %T') as DateTime, `Subject`, `Details` FROM audit_trail", conn);
            DataSet DS = new DataSet();
            mySqlDataAdapter.Fill(DS);
            auditTrail.DataSource = DS.Tables[0];

            connect.Close();
        }


        //private void timer1_Tick(object sender, EventArgs e)
        //{
        //    if (!auditTrail.Focused)
        //    {
        //        display_attendance();
        //    }
        //}
    }
}
