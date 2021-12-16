import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { OAuthModule } from 'angular-oauth2-oidc';

import { environment } from 'src/environments/environment';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';

import { FilModule } from './modules/fil/fil.module';
import { LibraryModule } from './modules/library/library.module';

import { StaticModule } from './static/static.module';

const APP_MODULES = [
  FilModule,
  LibraryModule,
]

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    StaticModule,
    OAuthModule.forRoot({
      resourceServer: {
        allowedUrls: [ environment.backendUri ],
        sendAccessToken: true
      }
    }),
    APP_MODULES,
  ],
  providers: [],
  bootstrap: [
    AppComponent
  ]
})
export class AppModule { }
