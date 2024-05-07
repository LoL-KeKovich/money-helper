import './Projects.css';
import {Link, Routes, Route} from "react-router-dom";
import CreateProject from "./CreateProject";
export default function Projects() {
    return(
        <>
            <div className='list-wrapper'>
                <div className='projects'>
                    <h1>Ваши проекты</h1> <br/>
                    <Link to="/projects/create" className='project_link'>Создать новый</Link>
                    <div className='project-items'></div>
                </div>
            </div>
        </>
    )
}