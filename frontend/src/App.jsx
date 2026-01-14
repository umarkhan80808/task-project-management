import { BrowserRouter, Routes, Route, Navigate } from "react-router-dom";
import Login from "./pages/Login";
import Projects from "./pages/Projects";
import ProjectDetails from "./pages/ProjectDetails";
import CreateTask from "./pages/CreateTask";

const ROLE = "admin"; // change to "user" to test

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<Navigate to="/login" />} />
        <Route path="/login" element={<Login />} />
        <Route path="/projects" element={<Projects />} />
        <Route
          path="/projects/:id"
          element={<ProjectDetails role={ROLE} />}
        />
        <Route
          path="/projects/:id/create-task"
          element={<CreateTask role={ROLE} />}
        />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
