package com.ftw.core;

import com.ftw.services.SignUpService;
import com.sun.jersey.guice.JerseyServletModule;
import com.sun.jersey.guice.spi.container.servlet.GuiceContainer;

public class MyGuiceConfig extends JerseyServletModule {

    @Override
    protected void configureServlets() {
        bind(SignUpService.class);

        serve("/*").with(GuiceContainer.class);
    }
}
