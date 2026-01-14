import { useNavigate } from "react-router-dom";

function Login() {
  const navigate = useNavigate();

  return (
    <div className="container">
      <h2>Login</h2>

      <input type="email" placeholder="Email" />
      <input type="password" placeholder="Password" />

      <button onClick={() => navigate("/projects")}>
        Login
      </button>
    </div>
  );
}

export default Login;
