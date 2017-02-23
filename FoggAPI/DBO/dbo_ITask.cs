using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using FoggAPI.Models;

namespace FoggAPI.DBO
{
    public interface dbo_ITask
    {
        List<Task> GetAll();
        Boolean Add(Task task);
        List<Task> GetByUser(int userId);
        Task Get(int task_id);
        Boolean Remove(int task_Id);
        Task Update(Task task);
    }
}