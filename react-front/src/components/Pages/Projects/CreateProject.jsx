import './CreateProject.css';
export default function CreateProject() {
    return(
        <div className='project-wrapper'>
            <div className='create-project'>
                <h1>Создайте проект</h1>
                <input type='text' placeholder='Ваша почта (автор проекта)'/>
                <input type='number' placeholder='Необходимая сумма'/>
                <textarea placeholder='Описание проекта'/>
                <button>Создать</button>
            </div>
        </div>
    )
}