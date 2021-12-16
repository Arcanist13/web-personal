import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { UserService } from 'src/app/modules/user/services/user.service';
import { ObservableService } from 'src/app/static/services/observable.service';
import { STORAGE_KEY_PREVIOUS_PAGE } from 'src/app/static/static_keys';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
  providers: [ ObservableService ]
})
export class LoginComponent {

  form: FormGroup;
  public loginInvalid = false;
  private formSubmitAttempt = false;

  constructor(
    private _observableService: ObservableService,
    private _fb: FormBuilder,
    private _userService: UserService,
    private _router: Router
  ) {
    // Check if already logged in, redirect to previous page
    this._observableService.subscribe(
      this._userService.loginUpdate,
      (state: boolean) => {
        if (state) {
          this._router.navigate([localStorage.getItem(STORAGE_KEY_PREVIOUS_PAGE)]);
        }
      }
    );

    this.form = this._fb.group({
      username: ['', Validators.required],
      password: ['', Validators.required]
    });
  }

  /**
   * On form submit check for errors and attempt to login account.
   *
   * Will redirect to the home page after successful login, or display
   * relevant errors on fail.
   */
  async onSubmit(): Promise<void> {
    this.loginInvalid = false;
    this.formSubmitAttempt = false;
    if (this.form.valid) {
      try {
        const username = this.form.get('username')?.value;
        const password = this.form.get('password')?.value;
        this._userService.login(username, password)
        .then(() => {
          // Navigate to the previous page
          console.log("Succeeded")
          const previousPage = localStorage.getItem(STORAGE_KEY_PREVIOUS_PAGE);
          if (!!previousPage) {
            this._router.navigate([previousPage]);
          }
          else {
            this._router.navigate(['spells']);
          }
        })
        .catch(() => {
          console.log("Caught error");
          this.loginInvalid = true;
        });
      } catch (err) {
        this.loginInvalid = true;
      }
    } else {
      this.formSubmitAttempt = true;
    }
  }

}
