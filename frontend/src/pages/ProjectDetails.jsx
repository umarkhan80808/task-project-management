import API_BASE from "../api";
import { useEffect } from "react";

function ProjectDetails() {
  useEffect(() => {
    fetch(`${API_BASE}/tasks/1/check/?role=user`)
      .then(res => res.json())
      .then(data => console.log("API RESPONSE:", data))
      .catch(err => console.error(err));
  }, []);

  return (
    <div>
      <h1>Project #1</h1>
    </div>
  );
}

export default ProjectDetails;
s