const user = {
    user: 'wheat',
    pwd: 'wheat',
    roles: [{
      role: 'readWrite',
      db: 'wheat'
    }]
  };
  
  db.createUser(user);

  db.wheat.insert({"name":"tutorials point"})