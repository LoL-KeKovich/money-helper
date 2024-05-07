import {Route, Routes, Link} from "react-router-dom";
import "./Header.css";
import Main from "../Pages/Main/Main";
import Login from "../Pages/Login/Login";
import Projects from "../Pages/Projects/Projects";
import CreateProject from "../Pages/Projects/CreateProject";
export default function Header() {
    return(
        <header>
            <div className='links'>
                <nav>
                    <ul>
                        <li>
                            <Link to="/" className='link'>Main</Link>
                        </li>
                        <li>
                            <Link to="/login" className='link'>Login</Link>
                        </li>
                        <li>
                            <Link to="/reset" className='link'>Reset</Link>
                        </li>
                        <li>
                            <Link to="/projects" className='link'>Projects</Link>
                        </li>
                    </ul>
                </nav>
                <Routes>
                    <Route path="/" element={<Main/>}/>
                    <Route path="/login" element={<Login/>}/>
                    <Route path="/projects" element={<Projects/>}/>
                    <Route path="/projects/create" element={<CreateProject/>}/>
                </Routes>
            </div>
        </header>
    )
}