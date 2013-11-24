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
import com.google.inject.servlet.RequestScoped;

@Path("/api/")
@RequestScoped
public class SignUpService {
	
	private static String user = "Laurentiu Tuca";
	
	@GET
	@Path("user")
	@Produces(MediaType.TEXT_PLAIN)
	public String getUserInfo() {
		return user;
	}
	
	@POST
	@Path("signup")	
	@Produces("text/plain")
	@Consumes("text/html")
	public void postUser(String user2) {
		user = user2;
	}
	
	@GET
	@Path("nuj")
	@Produces("text/plain")
	public String get() {
		ServiceDatabase db = new ServiceDatabase();
		System.out.println(db.addUser("Otto", "tot Otto", "otto.otto@yahoo.hdhf", "urspolar", "departe", "si mai departe", 32));
		return "Hello!!!";
	}

}
