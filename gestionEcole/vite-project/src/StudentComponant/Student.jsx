import axios from 'axios'
import React, { useEffect, useState } from 'react'
import './Student.css'
import deleteIcon from '../icons/deleteIcon.png'
import editIcon from '../icons/editing.png'

export default function Student() {
    const [eleve, setEleve] = useState([])
    useEffect(() => {
        const fetchEleves = async () => {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/eleves');
                setEleve(response.data);
            } catch (error) {
                console.error('Error fetching eleves:', error);
            }
        };
        fetchEleves();
    }, []);

    const handleDelete = async (id, EleveName) => {
        const confirmed = window.confirm(`Êtes-vous sûr de vouloir supprimer l'eleve ${EleveName} ?`);
      
        if (confirmed) {
          try {
            await axios.delete(`http://127.0.0.1:8000/api/eleves/${id}`);
            setEleve(eleve.filter((student) => student.id !== id));
          } catch (error) {
            console.error('Error deleting eleve:', error);
          }
        }
    };      
    return (
        <div>
            <table className="student-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Classe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {eleve.map((student) => (
                        <tr key={student.id}>
                            <td>{student.nom}</td>
                            <td>{student.prenom}</td>
                            <td>{student.adresse}</td>
                            <td>{student.email}</td>
                            <td>{student.telephone}</td>
                            <td>{student.classe.nom}</td>
                            <td>
                                <button onClick={() => handleDelete(student.id, student.nom)}><img src={deleteIcon} alt='Delete' /></button>
                                <button><a href={`/eleves/update/${student.id}`}><img src={editIcon} alt="Edit" /></a></button>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>

    )
}
