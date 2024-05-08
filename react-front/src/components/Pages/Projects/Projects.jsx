import './Projects.css';
import {Link, useNavigate} from "react-router-dom";
import {useEffect, useState} from "react";
import axios from 'axios';
export default function Projects() {

    useEffect(() => {
        if(localStorage.getItem('token') == null) {
            navigate("/login");
        } else {
            axios.get(`http://127.0.0.1:8000/projects`, {headers: {"Authorization" : `Bearer ${localStorage.getItem('token')}`}})
                .then((response) => {
                    setProjectData(response.data);
                    console.log(projectData);
            })
        }
    }, [])

    const navigate = useNavigate();

    const [projectData, setProjectData] = useState([]);
    return(
        <>
            <div className='list-wrapper'>
                <div className='projects'>
                    <h1>Ваши проекты</h1> <br/>
                    <div className='link-wrapper'>
                        <Link to="/projects/create" className='project_link'>Создать новый</Link>
                    </div>
                    <div className='project-items'>
                        {projectData.map((data)=> {
                            return (
                                <>
                                    <div className='projects'>
                                        <div className='project-description'><p>Описание проекта: {data.description}</p></div>
                                        <div className='project-author'><p>Автор проекта: {data.author}</p></div>
                                        <div className='project-status'><p>Статус сбора средств: {data.current_status}</p></div>
                                        <div className='project-need'><p>Необходимая сумма: {data.needed_sum}</p></div>
                                        <div className='project-current'><p>Текущая сумма: {data.current_sum}</p></div>
                                    </div>
                                </>
                            )
                        })}
                    </div>
                </div>
            </div>
        </>
    )
}