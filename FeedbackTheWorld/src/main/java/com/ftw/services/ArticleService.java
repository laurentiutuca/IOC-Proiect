package com.ftw.services;

import java.util.List;

import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.core.MediaType;

import com.ftw.datamodel.Article;
import com.ftw.datamodel.Post;
import com.ftw.interfaces.IManager;
import com.ftw.managers.ArticlesManager;
import com.google.inject.Inject;
import com.google.inject.name.Named;
import com.google.inject.servlet.RequestScoped;

@Path("/api/articles")
@RequestScoped
public class ArticleService {

	private IManager aManager;
	private ArticlesManager articlesManager; 
	
	@Inject
	public ArticleService(@Named("articles") IManager aManager) {
		this.aManager = aManager;
		this.articlesManager = (ArticlesManager) this.aManager;
		
	}
	
	@GET
	@Path("categories/{id}")
	@Produces(MediaType.APPLICATION_JSON)
	public List<Article> getAllFromCategory(@PathParam("id") int id) {
		return this.articlesManager.getArticlesByCategory(id);
	}
	
	@GET
	@Path("users/{id}")
	@Produces(MediaType.APPLICATION_JSON)
	public List<Article> getAllFromUser(@PathParam("id") int id) {
		return this.articlesManager.getArticlesByUser(id);
	}
	
	@GET
	@Path("latest")
	@Produces(MediaType.APPLICATION_JSON)
	public List<Article> getLatestArticles() {
		return this.articlesManager.getTopArticlesByDate();
	}
	
	@GET
	@Path("top")
	@Produces(MediaType.APPLICATION_JSON)
	public List<Article> getTopArticles() {
		return this.articlesManager.getTopArticlesByRating();
	}
	
	@POST
	@Produces(MediaType.APPLICATION_JSON)
	@Consumes(MediaType.APPLICATION_JSON)
	public void postArticle(Article a) {
		this.articlesManager.addArticle(a);
	}
	
	@GET
	@Path("{articleId}")
	@Produces(MediaType.APPLICATION_JSON)
	public Article getArticle(@PathParam("articleId") int articleId) {
		return this.articlesManager.getArticle(articleId);
	}
	
	@POST
	@Path("{articleId}")
	@Produces(MediaType.APPLICATION_JSON)
	@Consumes(MediaType.APPLICATION_JSON)
	public void postComment(@PathParam("articleId") int articleId, Post p) {
		Article a = this.articlesManager.getArticle(articleId);
		Post q = new Post();//just for getting a valid id;
		p.setId(q.getId());
		a.getComentarii().add(p);
	}
	
}
