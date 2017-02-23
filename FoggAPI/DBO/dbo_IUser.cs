using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using FoggAPI.Models;

namespace FoggAPI.DBO
{
    public interface dbo_IUser
    {
        List<User> GetAll();
        Boolean Add(User user);
        User Login(string username, string password);
        Boolean Remove(int user_Id);
        User Update(User user);
    }
}