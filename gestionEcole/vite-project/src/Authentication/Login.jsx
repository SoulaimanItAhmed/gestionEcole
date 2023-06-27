import axios from 'axios';
import React, { useState } from 'react'
import { useNavigate } from 'react-router-dom';

export default function Login () {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const navigate = useNavigate();

  const handleSubmit= async(e)=>{
    e.preventDefault();

    const response = await axios.post('http://127.0.0.1:8000/api',{email, password});
    console.log(response.data);
    setEmail('');
    setPassword('');
    const token = response.data.access_token;
    localStorage.setItem('token', token)
    navigate('/eleves');
  };

  return (

    <div>
      <h1>Login</h1>
      <form onSubmit={handleSubmit}>
        <label htmlFor="Email">Email :</label>
          <input type="text" value={email} onChange={(e)=>setEmail(e.target.value)}/>
          <label htmlFor="Password">Password :</label>
          <input type="text" value={password} onChange={(e)=>setPassword(e.target.value)}/>
          <br />
          <button type='submit'>Login</button>
      </form>
    </div>
  )
}
