import './CreateProject.css';
import {useNavigate} from "react-router-dom";
export default function CreateProject() {
    const navigate = useNavigate();
    const postData = () => {
        navigate("/projects");
    }
    return(
        <div className='project-wrapper'>
            <div className='create-project'>
                <h1>Создайте проект</h1>
                <input type='text' placeholder='Ваша почта (автор проекта)'/>
                <input type='number' placeholder='Необходимая сумма'/>
                <textarea placeholder='Описание проекта'/>
                <button onClick={postData}>Создать</button>
            </div>
        </div>
    )
}