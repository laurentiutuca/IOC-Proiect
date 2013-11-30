package com.ftw.services;

import java.util.List;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import com.ftw.datamodel.UserInfo;
import com.ftw.interfaces.IManager;
import com.ftw.managers.AdminManager;
import com.ftw.managers.UsersManager;
import com.google.inject.Inject;
import com.google.inject.name.Named;
import com.google.inject.servlet.RequestScoped;

@Path("/api/admin")
@RequestScoped
public class AdminService {
	
	private IManager usersManager;
	private IManager adminManager;
	
	@Inject
	public AdminService(@Named("users") IManager usersManager,@Named("admin") IManager adminManager) {
		this.usersManager = usersManager;
		this.adminManager = adminManager;
	}

	@GET
	@Path("users")
	@Produces(MediaType.APPLICATION_JSON)
	public List<UserInfo> getUsers() {
		UsersManager um = (UsersManager) this.usersManager;
		return um.getListOfUsers();
	}
	
	@GET
	@Path("users/{id}")
	@Produces(MediaType.APPLICATION_JSON)
	public UserInfo getUser(@PathParam("id") int id) {
		UsersManager um = (UsersManager) this.usersManager;
		return um.getListOfUsers().get(id);
	}
}
