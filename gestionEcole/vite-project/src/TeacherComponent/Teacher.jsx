import React, { useEffect, useState } from 'react'
import axios from 'axios';
import './teacher.css'
import deleteIcon from '../icons/deleteIcon.png'
export default function Teacher() {

    const [teacher, setTeacher] = useState([]);

    useEffect(() => {
        const fetchTeacher = async () => {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/enseignants');
                setTeacher(response.data);
            } catch (error) {
                console.error('Error fetching enseignants:', error);
            }
        };
        fetchTeacher();
    }, []);

    const handleDelete= async (id, TeacherName) =>{
        const confirmed = window.confirm(`Êtes-vous sûr de vouloir supprimer l'enseignant ${TeacherName} ?`);
        if(confirmed){
            try {
                await axios.get(`http://127.0.0.1:8000/api/enseignants/${id}`);
                setTeacher(teacher.filter((teacher)=> teacher.id !== id));
            } catch (error) {
                console.error('error deleting teacher:',error);
            }
        }
    }

    return (
        <div>
            <table className="enseignant-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {teacher.map((enseignant) => (
                        <tr key={enseignant.id}>
                            <td>{enseignant.nom}</td>
                            <td>{enseignant.prenom}</td>
                            <td>{enseignant.adresse}</td>
                            <td>{enseignant.email}</td>
                            <td>{enseignant.telephone}</td>
                            <td>
                                <button onClick={()=> handleDelete(enseignant.id, enseignant.nom)}><img src={deleteIcon} alt='Delete' /></button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

