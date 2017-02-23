using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using FoggAPI.Models;
using FoggAPI.DBAccess;
using MySql.Data.MySqlClient;

namespace FoggAPI.DBO
{
    public class dbo_User : dbo_IUser
    {
        public MyConnection connnection { get; set; }
        private MySqlCommand cmd { get; set; }
        public MySqlDataAdapter adp { get; set; }
        public MySqlDataReader reader { get; set; }

        public Boolean Add(User user)
        {
            using (connnection.conn)
            {
                
                string query = string.Format("INSERT INTO User VALUES('{0}','{1}','{2}','{3}','{4}') ", user.Name,user.Surname,user.Email,user.Password,user.DateLastLogin);
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                return cmd.ExecuteNonQuery()==1;
            }
        }

        public List<User> GetAll()
        {
            using (connnection.conn)
            {
                string query = "SELECT * user";
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                List<User> users = new List<User>();
                using (reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        users.Add(new User {
                        Id = reader.GetInt32(0),
                        Name = reader.GetString(1),
                        Surname = reader.GetString(2),
                        Email = reader.GetString(3),
                        Password = reader.GetString(4),
                        DateLastLogin = reader.GetDateTime(5)
                        });
                    }

                }
                return users;
            }
        }

        public User Login(string username, string password)
        {
            using (connnection.conn)
            {
                string query =string.Format("SELECT * FROM User WHERE 'Username'='{0}' AND 'Password' = '{1}' ",username,password);
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                using (reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                       return new User
                        {
                            Id = reader.GetInt32(0),
                            Name = reader.GetString(1),
                            Surname = reader.GetString(2),
                            Email = reader.GetString(3),
                            Password = reader.GetString(4),
                            DateLastLogin = reader.GetDateTime(5)
                        };
                    }

                }
            }
            return null;
        }

        public bool Remove(int user_Id)
        {
            using (connnection.conn)
            {
                string query = string.Format("DELETE FROM User WHERE  Id = '{0}' ", user_Id);
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                return cmd.ExecuteNonQuery() == 1;
            }
        }

        public User Update(User user)
        {
            throw new NotImplementedException();
        }
    }
}