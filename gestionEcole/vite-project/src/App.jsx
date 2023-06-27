import React from "react"
import { createBrowserRouter } from "react-router-dom"
import Student from "./StudentComponant/Student"
import Teacher from "./TeacherComponent/Teacher"
import Admin from "./Admins/Admin"
import StudentEdit from "./StudentComponant/StudentEdit"
import Login from "./Authentication/Login"
import RegisterForm from "./Authentication/RegisterForm"
   
    const App = createBrowserRouter([
      {
        path : "/",
        element : <Login />,
      },
      {
        path : "/register",
        element : <RegisterForm />
      },
      {
        path : '/',
        element : <Admin/>,
        children : [
          {
            path : '/eleves',
            element : <Student />
          },
          {
            path : '/enseignants',
            element : <Teacher />
          },
          {
            path : "/eleves/update/:id",
            element : <StudentEdit />
          }
        ]
      }
    ])

export default App
