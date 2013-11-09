package com.example;

import javax.ws.rs.GET;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;

import com.google.inject.servlet.RequestScoped;

@Path("/")
@RequestScoped
public class Services {

	@GET
    @Produces("text/plain")
    public String getIt() {
        return "Hello World!!!";
    }
	
	@GET
	@Path("{x}") 
	@Produces("text/plain")
	public String getX(@PathParam("x") String x) {
		return x;
	}
	
	@GET
	@Path("{x}/{c}")
	@Produces("text/plain")
	public String getXCount(@PathParam("x") String x, @PathParam("c") int c) {
		String result = "";
		for(int i = 0; i < c; i++)
			result += x + "\n";
		return result;
	}
	
}
