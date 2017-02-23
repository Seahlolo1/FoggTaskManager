using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace FoggAPI.Models
{
    public class Task
    {
        public int Id { get; set; }
        public int User_Id { get; set; }
        public string Description { get; set; }
        public DateTime DueDate { get; set; }
        public DateTime CreatedDate { get; set; }
        public string Status { get; set; }
    }

}