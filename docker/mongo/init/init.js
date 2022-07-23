var user = {
    user: "wheat",
    pwd: "wheat",
    roles: [
      {
        role: "dbOwner",
        db: "wheat"
      }
    ]
  };
  
  db.createUser(user);
  db.createCollection('form');