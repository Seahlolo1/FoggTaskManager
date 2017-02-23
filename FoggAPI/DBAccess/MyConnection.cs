using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using MySql.Data.MySqlClient;

namespace FoggAPI.DBAccess
{
    public class MyConnection:IDisposable
    {
      private string connectionString ="datasource = 127.0.0.1; port=3306;username=root;password=;database=foggdb;"; // db name = {foggdb}
        public MySqlConnection conn { get; set; }

        public MyConnection()
        {
            conn = new MySqlConnection(connectionString);
        }

        public void Dispose()
        {
            conn.Dispose();
        }
    }
}