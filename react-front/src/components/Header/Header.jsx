import {Route, Routes, Link} from "react-router-dom";
import "./Header.css";
import Main from "../Pages/Main/Main";
import Login from "../Pages/Login/Login";
import Projects from "../Pages/Projects/Projects";
import CreateProject from "../Pages/Projects/CreateProject";
import Reset from "../Pages/Reset/Reset";
import DonateProjects from "../Pages/Projects/DonateProjects";
export default function Header() {
    return(
        <header>
            <div className='links'>
                <nav>
                    <ul>
                        <li>
                            <Link to="/" className='link'>Главная</Link>
                        </li>
                        <li>
                            <Link to="/login" className='link'>Sign in</Link>
                        </li>
                        <li>
                            <Link to="/projects/all" className='link'>Все проекты</Link>
                        </li>
                        <li>
                            <Link to="/projects" className='link'>Ваши проекты</Link>
                        </li>
                    </ul>
                </nav>
                <Routes>
                    <Route path="/" element={<Main/>}/>
                    <Route path="/login" element={<Login/>}/>
                    <Route path="/projects" element={<Projects/>}/>
                    <Route path="/projects/create" element={<CreateProject/>}/>
                    <Route path="/projects/all" element={<DonateProjects/>}/>
                    <Route path="/reset" element={<Reset/>}/>
                </Routes>
            </div>
        </header>
    )
}