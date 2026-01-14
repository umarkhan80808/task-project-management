import { useNavigate, useParams } from "react-router-dom";

function CreateTask({ role }) {
  const { id } = useParams();
  const navigate = useNavigate();

  if (role !== "admin") {
    return (
      <div className="container">
        <h3>Access Denied</h3>
        <p>Only Admin can create tasks.</p>
        <button onClick={() => navigate(`/projects/${id}`)}>
          Go Back
        </button>
      </div>
    );
  }

  return (
    <div className="container">
      <h2>Create Task</h2>

      <input placeholder="Task title" />
      <select>
        <option>PENDING</option>
        <option>IN_PROGRESS</option>
        <option>DONE</option>
      </select>

      <button onClick={() => navigate(`/projects/${id}`)}>
        Save
      </button>
    </div>
  );
}

export default CreateTask;
