import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

function RegisterForm() {
  const [formData, setFormData] = useState({
    nom: '',
    prenom: '',
    date_de_naissance: '',
    adresse: '',
    telephone: '',
    classe_id: '',
    // user_id: '',
    email: '',
    password: '',
    role: '',
  });
  const navigate = useNavigate();

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    const registerData = {
      ...formData,
    };

    axios.post('http://127.0.0.1:8000/api/eleves', registerData)
      .then((response) => {
        // Handle the response data
        console.log(response.data);
    })
      .catch((error) => {
        // Handle any errors
        console.error(error);
      });

      // axios.post('http://127.0.0.1:8000/api/users', registerData)
      // .then((response)=>{
      //   console.log(response.data);
      // })
      // .catch((error)=>{
      //   console.log(error);
      // });
      navigate('/')
  };

  return (
    <form onSubmit={handleSubmit}>
      <input
        type="text"
        name="nom"
        value={formData.nom}
        onChange={handleChange}
        placeholder="Nom"
        required
      />
      <input
        type="text"
        name="prenom"
        value={formData.prenom}
        onChange={handleChange}
        placeholder="Prenom"
        required
      />
      <input
        type="date"
        name="date_de_naissance"
        value={formData.date_de_naissance}
        onChange={handleChange}
        placeholder="Date_de_naissance"
        required
      />
      <input
        type="text"
        name="adresse"
        value={formData.adresse}
        onChange={handleChange}
        placeholder="Adresse"
        required
      />
      <input
        type="number"
        name="telephone"
        value={formData.telephone}
        onChange={handleChange}
        placeholder="Telephone"
        required
      />
      <input
        type="number"
        name="classe_id"
        value={formData.classe_id}
        onChange={handleChange}
        placeholder="Classe id"
        required
      />
     
      <input
        type="text"
        name="email"
        value={formData.email}
        onChange={handleChange}
        placeholder="Email"
        required
      />
      <input
        type="password"
        name="password"
        value={formData.password}
        onChange={handleChange}
        placeholder="Password"
        required
      />
      <input
        type="text"
        name="role"
        value={formData.role}
        onChange={handleChange}
        placeholder="Role"
        required
      />
      
      <button type="submit">Register</button>
    </form>
  );
}

export default RegisterForm;
