package com.example;

import com.sun.jersey.guice.JerseyServletModule;
import com.sun.jersey.guice.spi.container.servlet.GuiceContainer;

public class MyGuiceConfig extends JerseyServletModule {

    @Override
    protected void configureServlets() {
        bind(Services.class);

        serve("/*").with(GuiceContainer.class);
    }
}
