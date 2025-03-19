describe("Task Manager", () => {
  it("should add a new task", () => {
    cy.visit("http://127.0.0.1:5500/index.html");
    cy.contains("Gestion de tâches");
    cy.get("input[id=taskInput]").type("New Task");
    cy.get("button").contains("Ajouter").click();
    cy.contains("New Task");
  });

  it("should remove a task", () => {
    cy.visit("http://127.0.0.1:5500/index.html");
    cy.contains("Gestion de tâches");
    cy.get("input[id=taskInput]").type("New Task");
    cy.get("button").contains("Ajouter").click();
    cy.get("button").contains("Supprimer").click();
    cy.get(".task-container").should("not.contain", "New Task");
  });

  it("should not add a task when the input field is empty", () => {
    cy.visit("http://127.0.0.1:5500/index.html");
    cy.contains("Gestion de tâches");
    cy.get("input[id=taskInput]").type(" ");
    cy.get("button").contains("Ajouter").click();
    cy.get(".task-container").should("not.contain", "  ");
  });
});
