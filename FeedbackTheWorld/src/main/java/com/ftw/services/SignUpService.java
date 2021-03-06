package com.ftw.services;

import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import com.ftw.core.ServiceDatabase;
import com.ftw.datamodel.UserInfo;
import com.ftw.datamodel.UserType;
import com.ftw.interfaces.IManager;
import com.ftw.managers.UsersManager;
import com.google.inject.Inject;
import com.google.inject.name.Named;
import com.google.inject.servlet.RequestScoped;

@Path("/api/signup")
@RequestScoped
public class SignUpService {
	private IManager usersManager;
	
	@Inject
	public SignUpService(@Named("users") IManager usersManager) {
		this.usersManager = usersManager;
	}
	@GET
	@Produces(MediaType.APPLICATION_JSON)
	public UserInfo getUserInfo() {
		return new UserInfo();
	}
	
	@POST
	@Produces(MediaType.APPLICATION_JSON)
	@Consumes(MediaType.APPLICATION_JSON)
	public void postUser(UserInfo user) {
		UsersManager uManager = (UsersManager) usersManager;
		uManager.addUser(user);
	}

}
