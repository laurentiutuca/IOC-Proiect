package com.ftw.core;

import com.ftw.interfaces.IManager;
import com.ftw.managers.AdminManager;
import com.ftw.managers.ArticlesManager;
import com.ftw.managers.UsersManager;
import com.ftw.services.AdminService;
import com.ftw.services.ArticleService;
import com.ftw.services.MainService;
import com.ftw.services.SignUpService;
import com.google.inject.name.Names;
import com.sun.jersey.guice.JerseyServletModule;
import com.sun.jersey.guice.spi.container.servlet.GuiceContainer;

public class MyGuiceConfig extends JerseyServletModule {

    @Override
    protected void configureServlets() {
        bind(SignUpService.class);
        bind(AdminService.class);
        bind(ArticleService.class);
        bind(MainService.class);
        
        bind(IManager.class).annotatedWith(Names.named("admin")).to(AdminManager.class);
        bind(IManager.class).annotatedWith(Names.named("users")).to(UsersManager.class);
        bind(IManager.class).annotatedWith(Names.named("articles")).to(ArticlesManager.class);
        
        serve("/*").with(GuiceContainer.class);
    }
}
