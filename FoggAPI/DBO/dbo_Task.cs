using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using FoggAPI.Models;
using MySql.Data.MySqlClient;
using FoggAPI.DBAccess;

namespace FoggAPI.DBO
{
    public class dbo_Task : dbo_ITask
    {
        public MyConnection connnection { get; set; }
        private MySqlCommand cmd { get; set; }
        public MySqlDataAdapter adp { get; set; }
        public MySqlDataReader reader { get; set; }

        public bool Add(Task task)
        {
            using (connnection.conn)
            {
                string query = string.Format("INSERT INTO Task VALUES('{0}','{1}','{2}','{3}','{4}') ", task.User_Id, task.Description, task.DueDate, task.CreatedDate, task.Status);
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                return cmd.ExecuteNonQuery() == 1;
            }
        }

        public Task Get(int task_id)
        {
            using (connnection.conn)
            {
                string query = string.Format("SELECT * FROM Task WHERE Id ='{0}'  ", task_id);
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                using (reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        return new Task
                        {
                            Id = reader.GetInt32(0),
                            User_Id = reader.GetInt32(1),
                            Description = reader.GetString(2),
                            DueDate = reader.GetDateTime(3),
                            CreatedDate = reader.GetDateTime(4),
                            Status = reader.GetString(5)
                        };
                    }
                }
            }
            return null;
        }

        public List<Task> GetAll()
        {
            using (connnection.conn)
            {
                string query = "SELECT * Task";
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                List<Task> tasks = new List<Task>();
                using (reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        tasks.Add(new Task
                        {
                            Id = reader.GetInt32(0),
                            User_Id = reader.GetInt32(1),
                            Description = reader.GetString(2),
                            DueDate = reader.GetDateTime(3),
                            CreatedDate = reader.GetDateTime(4),
                            Status = reader.GetString(5)
                        });
                    }

                }
                return tasks;
            }
        }

        public List<Task> GetByUser(int userId)
        {
            using (connnection.conn)
            {
                string query =string.Format("SELECT * Task WHERE User_Id ='{0}'",userId);
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                List<Task> tasks = new List<Task>();
                using (reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        tasks.Add(new Task
                        {
                            Id = reader.GetInt32(0),
                            User_Id = reader.GetInt32(1),
                            Description = reader.GetString(2),
                            DueDate = reader.GetDateTime(3),
                            CreatedDate = reader.GetDateTime(4),
                            Status = reader.GetString(5)
                        });
                    }

                }
                return tasks;
            }
        }

        public bool Remove(int task_Id)
        {
            using (connnection.conn)
            {
                string query = string.Format("DELETE FROM Task WHERE  Id = '{0}' ", task_Id);
                cmd = new MySqlCommand(query, connnection.conn);
                cmd.CommandTimeout = 60; // 60 seconds
                return cmd.ExecuteNonQuery() == 1;
            }
        }

        public Task Update(Task task)
        {
            throw new NotImplementedException();
        }
    }
}