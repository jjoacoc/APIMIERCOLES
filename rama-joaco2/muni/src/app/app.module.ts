import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

//componentes
import { ConfiguracionesModule } from './modules/configuraciones/configuraciones.module';
import { SharedModule } from './modules/shared/shared.module';


//importaciones de angular


@NgModule({
  declarations: [
    AppComponent,
  ],

  imports: [
    BrowserModule,
    SharedModule,
    ConfiguracionesModule,
    AppRoutingModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
