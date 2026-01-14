import { useNavigate } from "react-router-dom";

const projects = [
  { id: 1, name: "Task Management System" },
  { id: 2, name: "CRM App" },
];

function Projects() {
  const navigate = useNavigate();

  return (
    <div style={{ padding: 40 }}>
      <h2>Projects</h2>

      <ul>
        {projects.map((p) => (
          <li key={p.id} style={{ marginBottom: 10 }}>
            <button onClick={() => navigate(`/projects/${p.id}`)}>
              {p.name}
            </button>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Projects;
