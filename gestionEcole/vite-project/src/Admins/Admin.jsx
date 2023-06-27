import React from 'react'
import { Outlet, Link} from 'react-router-dom'
import './Admin.css'

export default function Admin () {
  return (
    <div className='divP'>
        <div>
            <h2>Tetouan Park</h2>
        </div>
        <nav>
            <ul>
                <li><Link to='/eleves'>Eleves</Link></li>
                <li><Link to='/enseignants'>Enseignants</Link></li>
                <li><a href="">Classes</a></li>
                <li><a href="">Matieres</a></li>
                <li><a href="">Notes</a></li>
            </ul>
        </nav>
        <Outlet/>
    </div>
  )
}