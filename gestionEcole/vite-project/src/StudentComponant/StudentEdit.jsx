import axios from 'axios';
import React, { useEffect, useState } from 'react'
import {  useNavigate, useParams } from 'react-router-dom';


export default function StudentEdit() {
  
  const [data, setData] = useState({});
  const {id} = useParams()
  const [classes, setClasses] = useState([]);
  const navigate = useNavigate();
  

  useEffect(()=>{
    fetchData();
  }, []);

  const fetchData = async () => {

      const response = await axios.get(`http://127.0.0.1:8000/api/eleves/${id}/edit`);
      setData(response.data);
      fetchClasses();
  };

  const fetchClasses = async () =>{
    const response = await axios.get("http://127.0.0.1:8000/api/classes");
    setClasses(response.data);
  };

  const handleChange = (e) =>{
      setData({...data, [e.target.name]: e.target.value});
  };

  const handleUpdate = async () =>{
    await axios.put(`http://127.0.0.1:8000/api/eleves/${id}`, data);
    navigate("/eleves");
  };

  return (
    <div>
        <label htmlFor="Nom">Nom :</label>
        <input type="text" name='nom' value={data.nom} onChange={handleChange}/>
        <label htmlFor="Prenom">Prenom :</label>
        <input type="text" name='prenom' value={data.prenom} onChange={handleChange}/>
        <label htmlFor="Date">Date :</label>
        <input type="Date" name='date_de_naissance' value={data.date_de_naissance} onChange={handleChange}/>
        <label htmlFor="Adresse">Adresse :</label>
        <input type="text" name='adresse' value={data.adresse} onChange={handleChange}/>
        <label htmlFor="Email">Email :</label>
        <input type="email" name='email' value={data.email} onChange={handleChange}/>
        <label htmlFor="Telephone">Telephone :</label>
        <input type="phone" name='telephone' value={data.telephone} onChange={handleChange}/>
        <label htmlFor="Classe">Classe :</label>
        <select name='classe_id' value={data.classe_id} onChange={handleChange}>
            {classes.map((classe)=>(
              <option value={classe.id} key={classe.id} >{classe.nom}</option>
            ))}          
        </select>
      <br />
        <button type="submit" onClick={handleUpdate}>Update</button>
    </div>
  )
}
