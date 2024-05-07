import './Login.css';
export default function Login() {
    return(
        <>
            <div class='wrapper'>
                <div className='auth'>
                    <h1>Авторизуйтесь</h1>
                    <input type='text' placeholder='Введите ваши инициалы'/>
                    <input type='email' placeholder='Введите ваш email'/>
                    <input type='password' placeholder='Введите пароль'/>
                    <button>Авторизоваться</button>
                </div>
            </div>
        </>
    )
}