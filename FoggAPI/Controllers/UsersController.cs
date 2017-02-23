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
    public class UsersController : ApiController
    {

        /*********************************************************************
       **This code cannnot be used for production as its not safe
       **Could have used Entity Framework to simply get rid of SQL statements
               ------------- api/users --------- browser path to be used by angular client connection or JS Ajax
       **********************************************************************/

        // address =  host:port/api/users

        public dbo_IUser dbo_User { get; set; }

        // inject User interface into the controller
        public UsersController(dbo_IUser IUser)
        {
            dbo_User = IUser;
        }

        // GET url : api/users
        IEnumerable<User> Get()
        {
            return dbo_User.GetAll();
        }

        // Login User
        // POST url : api/users/{ username='peter', password= 'abc'}  as parameter 
        public IHttpActionResult Post(string username,string password)
        {
            User user = dbo_User.Login(username, password);
            if (user == null)
            {
                return NotFound();
            }

            return Ok(user); //return the current user
        }

        // Registrring User
        // Add new Task
        // POST url : api/users/{ User{} }  Json Task Object as parameter or body
        public IHttpActionResult Post(User user)
        {

            bool isRegisted = dbo_User.Add(user);
            if (isRegisted)
            {
                return Ok("Your Registered.");
            }
            return Ok("Error Occured");
        }

        public void Delete(int user_Id)
        {
            dbo_User.Remove(user_Id);
        }

    }
}
