using FoggAPI.DBO;
using FoggAPI.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;


namespace FoggAPI.Controllers
{
    public class TasksController : ApiController
    {

        /*********************************************************************
        **This code cannnot be used for production as its not safe
        **Could have used Entity Framework to simply get rid of SQL statements
            ------------- api/tasks --------- browser path/ to be used by angular client connection or JS Ajax
        **********************************************************************/



        public dbo_ITask dbo_Task { get; set; }

        // inject User interface into the controller
        public TasksController(dbo_ITask ITask)
        {
            dbo_Task = ITask;
        }

        // returns all tasks
        //GET url : api/tasks
        IEnumerable<Task> Get()
        {
            return dbo_Task.GetAll();
        }


        // returns all tasks for a user
        //GET url : api/tasks/{user_id = 1} as parameters
        IEnumerable<Task> Get(int user_id)
        {
           return dbo_Task.GetByUser(user_id);      
        }

        // get single task
        // GET url : api/tasks/{task_Id = 1 , user_id = 1}   as parameters
        public IHttpActionResult get(int task_Id,int user_id)
        {
            Task task = dbo_Task.Get(task_Id);
            if(task==null)
            {
                return NotFound();
            }
            return Ok(task); //return the task
        }

        // Add new Task
        // POST url : api/tasks/{ Task{} }  Json Task Object as parameter or body
        public IHttpActionResult Post(Task task)
        {
            bool isRegisted = dbo_Task.Add(task);
            if (isRegisted)
            {
                return Ok("Task Added Successfully");
            }
            return Ok("Error Occured");
        }

        public void Delete(int task_Id)
        {
            dbo_Task.Remove(task_Id);
        }

    }
}
