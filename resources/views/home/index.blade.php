<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>FARM ASSIST</title>
  <link rel="icon" type="image/png" href="images/farm-logo.svg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Chivo:wght@400;700&display=swap');
    $black: #000000;
    $white: #ffffff;
    $fern: #66BB6A;
    $btn-bs: 1px 10px 30px -10px rgba(102,
        187,
        106,
        1);
    $outer-space: #263238;
    $alabaster: #f7f7f7;
    $limed-spruce: #324148;
    $lynch: #607D8B;

    *,
    *:before,
    *:after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      font-size: 10px;
    }

    body {
      font-family: 'Chivo', sans-serif;
      font-size: 1.6rem;
      color: $black;
    }

    ul {
      list-style: none;
    }

    a {
      text-decoration: none;
      cursor: pointer;
      color: $black;
    }

    img {
      width: 100%;
      max-width: 100%;
    }

    /* section {
      padding: 5rem 0;
    } */

    .container {
      width: 100%;
      padding: 0 1.5rem;
      max-width: 144rem;
      margin: 0 auto;
    }

    .w-120 {
      max-width: 120rem;
    }

    .w-105 {
      max-width: 105rem;
    }

    .btn {
      border-radius: .5rem;
      padding: 1.2rem;
    }

    @mixin btnShadow {
      -webkit-box-shadow: $btn-bs;
      -moz-box-shadow: $btn-bs;
      box-shadow: $btn-bs;
    }

    @mixin btnHoverAnimate($defaultbgColor, $hoverBgColor, $hoverTextColor) {
      /*
    Button hover effect resource
    https://codepen.io/alticreation/pen/zBZwOP
    */
      display: inline-block;
      transition: all .3s;
      position: relative;
      overflow: hidden;
      z-index: 1;

      &:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: $defaultbgColor;
        z-index: -2;
      }

      &:before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0%;
        height: 100%;
        background-color: $hoverBgColor;
        transition: all .3s;
        z-index: -1;
      }

      &:hover {
        color: $hoverTextColor;

        &:before {
          width: 100%;
        }
      }
    }

    /*Header */

    header {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      z-index: 2;
    }

    .header__nav {
      padding: 2rem 1.5rem;
      margin: auto;
      display: flex;
      align-items: center;
    }

    .header__logo {
      flex: 2;

      img {
        max-width: 12rem;
        height: 80px;
      }
    }

    .header__nav__content {
      flex: 1;
      display: flex;
      align-items: center;

      &.open {
        transform: translateX(0);
      }
    }

    .header__menu {
      flex: 4;
      display: flex;
      grid-gap: 2.5rem;
    }

    .menu__link {
      cursor: pointer;
      transition: .2s all;

      &:hover {
        color: $fern;
      }

      &.active {
        color: $fern;
        font-weight: bold;
      }
    }

    .header__signup {
      flex: 4;
      display: flex;
      justify-content: flex-end;
    }

    .btn__signup {
      border: 1px solid $white;
      font-size: 1.6rem;
      color: $white;
    }

    .hamburger-menu-wrap {
      position: absolute;
      top: 3rem;
      right: 2rem;
      cursor: pointer;
      z-index: 1;
      display: none;
    }

    .hamburger-menu {
      width: 2rem;
      height: 2rem;
      display: flex;
      grid-row-gap: .2rem;
      flex-wrap: wrap;
      align-items: center;
      position: relative;
    }

    .hamburger-menu .line {
      background-color: $fern;
      height: .3rem;
      width: 100%;
      -webkit-transition: all 0.3s;
      transition: all 0.3s;
    }

    .nav-close-icon {
      position: relative;
      padding: 3rem 2rem;
      height: 2.5rem;
      cursor: pointer;
      display: none;

      &:before,
      &:after {
        position: absolute;
        content: '';
        width: 4px;
        right: 4rem;
        height: 40%;
        background-color: $white;
      }

      &:before {
        -webkit-transform: rotateZ(45deg);
        transform: rotateZ(45deg) translate(0.5rem, -1rem);
      }

      &:after {
        -webkit-transform: rotateZ(-45deg);
        transform: rotateZ(-45deg) translate(1rem, 0.5rem);
      }
    }


    /*End Header */


    /*End Hero */

    .hero {
      margin: auto;
      height: 80vh;
    }

    .hero__content {
      display: flex;
    }

    .hero__text {
      margin-top: 10rem;
      max-width: 50rem;
    }

    .hero__title {
      font-size: 3.6rem;
    }

    .hero__description {
      font-size: 1.8rem;
      margin: 2.5rem 0 5rem;
      color: $outer-space;
    }

    .btn__hero {
      border: 1px solid $fern;
      color: $white;
      font-size: 1.8rem;
    }

    .hero__img {
      position: absolute;
      top: 0;
      right: 0;
      z-index: -1;

      img {
        max-height: 100vh;
        width: initial;
      }
    }


    /*End Hero */


    /*Opportunities*/

    .opportunities {
      position: relative;
    }

    .opportunities__img {
      position: absolute;
      left: -1.5rem;
      top: -16rem;
      z-index: -1;

      img {
        max-height: 55rem;
        max-width: 16rem;
      }
    }

    .opportunities__content {
      margin: auto;
      display: flex;
      flex-direction: column;
      padding-bottom: 5rem;
      border-bottom: 2px solid $alabaster;
      margin-bottom: 4rem;
    }

    .opportunities__head {
      text-align: center;
      max-width: 70rem;
      margin: 0 auto 10rem;
    }

    .opportunities__title {
      font-size: 3.6rem;
      color: $black;
    }

    .opportunities__description {
      margin-top: 2.5rem;
      font-size: 1.8rem;
      font-weight: 400;
      color: $outer-space;
    }

    .opportunities__body {
      display: flex;
      /* flex-wrap: wrap; */
      grid-gap: 12.5rem;
      align-self: baseline;
      justify-content: center;
    }

    .opportunity {
      width: 30%;
      background-color: $white;
      border-radius: .5rem;
      filter: drop-shadow(0 0 0.75rem rgba(27, 31, 35, 0.15));
      padding: 5rem 2.5rem 2.5rem;
      transition: all 0.3s ease-out;

      &.active {
        background-color: $fern;

        .opportunity__title,
        .opportunity__description {
          color: $white;
        }
      }

      &:hover {
        transform: translateY(-2rem);
      }
    }

    .opportunity__icon {
      max-height: 5.6rem;
      width: initial;
    }

    .opportunity__title {
      font-size: 1.8rem;
      color: $outer-space;
      margin: 2.5rem 0;
    }

    .opportunity__description {
      font-size: 1.6rem;
      font-weight: 400;
      color: $outer-space;
    }


    /*End Opportunities*/


    /* Invest*/

    .invest {
      margin: auto;
    }

    .invest__head {
      max-width: 70rem;
    }

    .invest__title {
      font-size: 3.6rem;
    }

    .invest__description {
      margin-top: 1.5rem;
      color: $limed-spruce;
      font-size: 1.8rem
    }

    .invest__body {
      margin-top: 5rem;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(40rem, 1fr));
      grid-gap: 2.5rem;
    }

    .invest__item {
      padding: 2.5rem;

      &:nth-child(1) {
        background: url('https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/investments/invest-1.png') no-repeat center/cover;
      }

      &:nth-child(2) {
        background: url('https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/investments/invest-2.png') no-repeat center/cover;
      }
    }

    .invest__item__subtitle {
      color: $fern;
      font-size: 1.4rem;
      font-weight: 400;
      position: relative;

      &::after {
        position: absolute;
        content: '';
        top: 3rem;
        left: 0;
        width: 5.6rem;
        height: 4px;
        background-color: $white;
      }
    }

    .invest__item__body {
      margin: 5rem 0 2.5rem;
    }

    .invest__item__title {
      color: $white;
      font-size: 3.1rem;
      max-width: 30rem;
    }

    .invest__item_description {
      font-size: 1.6rem;
      color: $white;
      max-width: 30rem;
    }

    .btn__invest {
      color: $fern;
      display: inline-block;
      width: 20rem;
      text-align: center;
    }


    /*End Invest*/


    /*End How Is Works*/

    .how-is-works {
      background: url('https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/how-is-works-bg.png') no-repeat;
      background-color: $fern;
      margin: auto;
    }

    .works__content {
      max-width: 70rem;
      margin: auto;
      color: $white;
      padding: 0 1.5rem;
    }

    .works__head {
      text-align: center;
    }

    .works__title {
      font-size: 3.6rem;
    }

    .works__description {
      margin-top: 2.5rem;
      font-size: 1.8rem;
      font-weight: 400;
      line-height: 3rem;
    }

    .works__body {
      margin: 5rem 0 10rem;
    }

    .form_progressbar {
      display: flex;
      grid-column-gap: 13rem;
    }

    .progressbar__step {
      cursor: pointer;
      border-radius: 50%;
      width: 7.2rem;
      height: 7.2rem;
      border: 1px solid $white;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;

      &.active {
        background-color: $white;
        color: $fern;

        &:not(:first-child)::after {
          height: 5px;
          transform: scaleX(0);
          transform-origin: left;
          animation: progressBarStepAnimate 0.5s linear forwards;
        }
      }

      &:not(:first-child) {

        &::before,
        &::after {
          position: absolute;
          content: '';
          right: 100%;
          width: 13rem;
          height: 1px;
          background-color: $white;
          pointer-events: none;
        }
      }
    }

    @keyframes progressBarStepAnimate {
      100% {
        transform: scaleX(1);
      }
    }

    .works__footer {
      display: flex;
      overflow: hidden;
    }

    .works__step__content {
      flex-shrink: 0;
      width: 100%;
      display: flex;
      grid-gap: 2.5rem;
      transition: .5s all linear;
      padding: 3rem;
      position: relative;
      align-items: center;

      &::before {
        position: absolute;
        content: '';
        left: 1.5rem;
        top: 1.5rem;
        width: calc(100% - 3rem);
        height: calc(100% - 3rem);
        -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 75%);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 75%);
        border-radius: .8rem;
        // background-color: red;
      }
    }

    .works__step_title {
      font-size: 2.4rem;
      flex: 5;
    }

    .works__step_description {
      flex: 6;
      font-size: 1.6rem;
      font-weight: 400;
    }


    /*End How Is Works*/


    /*Testimonials*/

    .testimonials {
      margin-top: 20rem;
    }

    .testimonials__head {
      position: relative;
      margin: auto;
    }

    .testimonials__quote {
      position: absolute;
      top: 0;
      left: 0;
      max-height: 11rem;
      width: auto;
    }

    .testimonials__title {
      font-size: 3.6rem;
      max-width: 45rem;
    }

    .testimonials__body {
      margin: 8rem auto 4rem;
      width: 100%;
      overflow: hidden;
      padding: 2rem 0;
      position: relative;

      &::before,
      &::after {
        position: absolute;
        content: '';
        top: 0;
        width: 10%;
        background-color: $white;
        opacity: .5;
        height: 100%;
        z-index: 1;
      }

      &::before {
        left: 0;
        filter: drop-shadow(5rem 0 4rem $white);
      }

      &::after {
        right: 0;
        filter: drop-shadow(-5rem 0 4rem $white);
      }
    }

    .testimonials__list {
      display: flex;
      grid-gap: 2.5rem;
      position: relative;
    }

    .testimonial {
      flex-shrink: 0;
      width: 33%;
      padding: 2.5rem;
      background-color: $white;
      filter: drop-shadow(0 0 0.75rem rgba(27, 31, 35, 0.15));
      transition: transform .3s ease;

      &:hover {
        transform: scale(1.1);
        z-index: 1;
      }
    }

    .testimonial__profile {
      display: flex;
      grid-gap: 2.5rem;
      align-items: center;
      font-size: 1.8rem;
    }

    .testimonial__img {
      filter: drop-shadow(0 0 0.5rem $fern);
      width: 7.2rem;
      height: 7.2rem;

      img {
        width: initial;
        max-width: initial;
      }
    }

    .testimonial__name {
      color: $fern;
    }

    .testimonial__title {
      color: $outer-space;
    }

    .testimonial__description {
      margin-top: 5rem;
      font-size: 1.8rem;
      color: $limed-spruce;
    }

    .testimonials__footer {
      margin: auto;
    }

    .testimonials__directions {
      display: flex;
      grid-gap: 1.5rem;
    }

    .btn__testimonials {
      border-radius: 50%;
      cursor: pointer;
      padding: 1.5rem;
      outline: none;
      border: none;
      background-color: $fern;
      color: $white;

      &.disable {
        background-color: $white;
        color: $outer-space;
      }
    }


    /*End Testimonials*/


    /*Farm Invest */

    .farm-invest {
      margin: auto;
      padding: 5rem 2.5rem;
      text-align: center;
      background-color: $white;
      filter: drop-shadow(0 0 0.75rem rgba(27, 31, 35, 0.15));
      margin-bottom: 10rem;
    }

    .farm-invest__title {
      font-size: 3.6rem;

      span {
        color: $fern;
      }
    }

    .btn__farm--invest {
      border: 1px solid $fern;
      color: $white;
      display: inline-block;
      min-width: 25rem;
      margin-top: 4rem;
    }


    /*End Farm Invest*/


    /*Footer*/

    .footer {
      position: relative;
    }

    .footer__body {
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      grid-gap: 2.5rem;
      align-items: baseline;
      padding-bottom: 5rem;
      border-bottom: 2px solid $alabaster;
    }

    .footer__nav {
      display: flex;
      flex-wrap: wrap;
      flex: 9 2 auto;
      grid-row-gap: 2.5rem;
    }

    .footer_nav__menu {
      flex-basis: 33%;
    }

    .footer_nav__item {
      padding: 1rem 2.5rem;
    }

    .footer_nav__menu__title {
      font-size: 1.6rem;
      text-transform: uppercase;
    }

    .footer_nav__link {
      font-size: 1.6rem;
      color: $lynch;
      transition: .2s all;

      &:hover {
        color: $fern;
      }
    }

    .footer__contact {
      flex: 1 0 28rem;
      background-color: $fern;
      padding: 5rem 5rem 10rem;
      color: $white;
      display: flex;
      align-items: center;
      flex-direction: column;

      &>* {
        max-width: 16rem;
      }
    }

    .footer__contact__title {
      margin-bottom: 1.5rem;
    }

    .email {
      color: $white;
    }

    .btn__signin {
      margin-top: 1.5rem;
      border: 1px solid $white;
      color: $fern;
    }

    .footer__bottom__content {
      margin-top: 5rem;
      display: flex;
      align-items: baseline;
      justify-content: space-between;
      margin: 5rem auto 0;
      padding-bottom: 10rem;
    }

    .footer_copyright {
      color: $lynch;
      font-size: 1.4rem;
      text-align: center;
    }

    .footer_img {
      position: absolute;
      bottom: 0;
      right: -1.5rem;
      max-width: 50rem;
    }


    /*End Footer*/

    @media screen and (max-width:950px) {

      /*Header */
      .hamburger-menu-wrap,
      .nav-close-icon {
        display: block;
      }

      .header__nav__content {
        flex: initial;
        align-items: initial;
        position: fixed;
        top: 0;
        right: 0;
        width: 30rem;
        height: 100vh;
        background-color: $fern;
        z-index: 2;
        flex-direction: column;
        transform: translateX(40rem);
        transition: transform 0.3s ease-in-out;
        grid-gap: 2.5rem;
      }

      .header__menu {
        flex-direction: column;
        flex: initial;
        align-items: center;
      }

      .menu__link {
        color: $white;

        &:hover,
        &.active {
          color: $white;
        }
      }

      .header__signup {
        flex: initial;
        justify-content: center;
      }

      /*End Header */
      /*Hero */
      .hero__content {
        justify-content: center;
        text-align: center;
      }

      .hero__img {
        display: none;
      }

      /*End Hero */
      /*Testimonials*/
      .testimonial {
        width: 50%;
      }

      /*End Testimonials*/
    }

    @media screen and (max-width:768px) {

      /* Opportunities*/
      .opportunity {
        width: 100%;
      }

      /*End Opportunities*/
      /*How Is Works*/
      .form_progressbar {
        grid-column-gap: 7rem;
        justify-content: center;
      }

      .progressbar__step {
        width: 4.8rem;
        height: 4.8rem;

        &:not(:first-child) {

          &::before,
          &::after {
            width: 7rem;
          }
        }
      }

      .works__step__content {
        flex-direction: column;
      }

      .works__step_title {
        font-size: 2rem;
        text-align: center;
      }

      /*End How Is Works*/
      /*Testimonials*/
      .testimonials__body {

        &::before,
        &::after {
          background-color: transparent;
        }
      }

      .testimonials__list {
        padding-left: 1.5rem;
      }

      .testimonial {
        width: calc(100% - 3rem);
        word-wrap: break-word;

        &:hover {
          transform: initial;
        }
      }

      /*End Testimonials*/
      /*Footer*/
      .footer_nav__menu {
        text-align: center;
      }

      .footer__bottom__content {
        flex-direction: column;
        grid-row-gap: 4.5rem;
        align-items: center;
      }

      /*end Footer*/
    }

    @media screen and (max-width: 500px) {

      /*Global*/
      .opportunities__title,
      .invest__title,
      .works__title,
      .testimonials__title,
      .farm-invest__title {
        font-size: 3rem;
      }

      .invest__description,
      .works__description {
        font-size: 1.6rem;
      }

      /*End Global*/
      /*Hero*/
      .hero__title {
        font-size: 3.6rem;
      }

      /*End Hero*/
      /*Opportunities*/
      .opportunities__img {
        top: -8rem;

        img {
          max-height: 40rem;
          max-width: 10rem;
        }
      }

      .opportunity__icon {
        width: inherit;
      }

      /*End Opportunities*/
      /*Invest Section*/
      .invest__body {
        grid-template-columns: repeat(auto-fill, minmax(32rem, 1fr));
      }

      .invest__item__title {
        font-size: 2.4rem;
      }

      /*End Invest Section*/
      /*How Is Works*/
      .form_progressbar {
        grid-column-gap: 4rem;
        justify-content: center;
      }

      .progressbar__step {
        width: 4.8rem;
        height: 4.8rem;

        &:not(:first-child) {

          &::before,
          &::after {
            width: 4rem;
          }
        }
      }

      .works__step_title {
        font-size: 1.8rem;
      }

      /*End How Is Works*/
      /*Testimonials*/
      .testimonials {
        margin-top: 10rem;
      }

      /*End Testimonials*/
      /*Footer*/
      .footer_nav__menu {
        text-align: left;
      }

      .footer__contact {
        width: 100%;
      }

      /*End Footer*/
    }

    @media screen and (max-width: 360px) {

      /*Invest Section*/
      .invest__body {
        grid-template-columns: repeat(auto-fill, minmax(30rem, 1fr));
      }

      /*End Invest Section*/
      /*How Is Works*/
      .progressbar__step {
        width: 4rem;
        height: 4rem;
      }

      /*End How Is Works*/
      /*Testimonials */
      .testimonial__profile {
        flex-direction: column;
        text-align: center;
      }

      /*End Testimonials*/
      /*Farm Invest*/
      .btn__farm--invest {
        width: 80%;
        min-width: initial;
      }

      /*End Farm Invest*/
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <nav class="header__nav w-120">
        <div class="header__logo">
          <img src="images/farm-assist-logo.jpg" alt="Logo">
        </div>
        <div class="header__nav__content">
          <div class="nav-close-icon"></div>
          <!-- <ul class="header__menu">
            <li class="menu__item">
              <a href="#" class="menu__link active">Home</a>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Product</a>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Team</a>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Blog</a>
            </li>
            <li class="menu__item">
              <a href="#" class="menu__link">Contact</a>
            </li>
          </ul> -->
          <div class="header__signup">
            <a href="{{route('login')}}" class="btn btn__signup">
              <i class="fas fa-user-plus"></i> Sign Up
            </a>
          </div>
          <div class="header__signup">
            <a href="{{route('register')}}" class="btn btn__signup">
              <i class="fas fa-user-plus"></i> Sign In
            </a>
          </div>
        </div>

        <div class="hamburger-menu-wrap">
          <div class="hamburger-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </div>
        </div>
      </nav>
    </header>

    <section class="hero w-120">
      <div class="hero__content">
        <div class="hero__text">
          <h1 class="hero__title">Efficient Farm Management Made Easy</h1>
          <p class="hero__description">
            Farm Assist helps farmers manage their crops, livestock, and finances with real-time weather updates, market
            prices, agricultural best practices, and access to loans and insurance.
          </p>
          <!-- <a href="#" class="btn btn__hero">Get Started</a> -->
        </div>
        <div class="hero__img">
          <img src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/hero.png"
            alt="Farm Assist Image">
        </div>
      </div>
    </section>

    <section class="opportunities">
      <div class="opportunities__img">
        <img src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/leaf.png"
          alt="Leaf Image">
      </div>
      <div class="opportunities__content w-105">
        <div class="opportunities__head">
          <h2 class="opportunities__title">Farm Management Opportunities</h2>
          <p class="opportunities__description">Explore how our farm management solutions can help you optimize
            operations, enhance sustainability, and connect with agricultural experts.</p>
        </div>
        <div class="opportunities__body">
          <div class="opportunity">
            <img
              src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/opportunites/opportunity-1.svg"
              alt="Icon" class="opportunity__icon">
            <h4 class="opportunity__title">Connect with Agricultural Experts</h4>
            <p class="opportunity__description">Gain access to a network of agricultural experts who can provide
              valuable insights and guidance to help you manage your farm effectively.</p>
          </div>
          <div class="opportunity ">
            <img
              src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/opportunites/opportunity-2.svg"
              alt="Icon" class="opportunity__icon">
            <h4 class="opportunity__title">Optimize Farm Operations</h4>
            <p class="opportunity__description">Use our advanced tools and techniques to streamline your farm
              operations, improve productivity, and maximize yields.</p>
          </div>
          <div class="opportunity">
            <img
              src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/opportunites/opportunity-3.svg"
              alt="Icon" class="opportunity__icon">
            <h4 class="opportunity__title">Enhance Sustainability</h4>
            <p class="opportunity__description">Implement sustainable farming practices that protect the environment,
              conserve resources, and promote long-term viability of your farm.</p>
          </div>
        </div>
      </div>
    </section>



    <!-- <section class="how-is-works w-120">
      <div class="works__content">
      <div class="works__head">
            <h2 class="works__title">How Farm Management Works</h2>
            <p class="works__description">
                Discover the essential steps in farm management, from planning to harvesting, ensuring efficient and sustainable agricultural practices.
            </p>
        </div>
        <div class="works__body">
            <ul class="form_progressbar">
                <li class="progressbar__step active" data-step="1">01</li>
                <li class="progressbar__step" data-step="2">02</li>
                <li class="progressbar__step" data-step="3">03</li>
                <li class="progressbar__step" data-step="4">04</li>
            </ul>
        </div>

        <div class="works__footer">
        <div class="works__step__content first_step">
                <h3 class="works__step_title">Plan Your Farm Operations</h3>
                <p class="works__step_description">
                    Effective planning is crucial for successful farming. Assess your resources, choose the right crops, and create a comprehensive plan to optimize your farm operations.
                </p>
            </div>
            <div class="works__step__content">
                <h3 class="works__step_title">Plant and Nurture Your Crops</h3>
                <p class="works__step_description">
                    Use the best agricultural practices for planting and nurturing your crops. Ensure soil health, proper irrigation, and pest control for optimal growth.
                </p>
            </div>
            <div class="works__step__content">
                <h3 class="works__step_title">Manage Livestock Effectively</h3>
                <p class="works__step_description">
                    Keep your livestock healthy and productive with proper feeding, healthcare, and housing. Monitor their well-being and take preventive measures to avoid diseases.
                </p>
            </div>

          <div class="works__step__content">
                <h3 class="works__step_title">Harvest and Sell Your Produce</h3>
                <p class="works__step_description">
                    Harvest your crops at the right time to ensure the best quality. Use efficient harvesting techniques and find the best markets to sell your produce for maximum profit.
                </p>
            </div>
        </div>
      </div>


    </section>

    <section class="testimonials">
      <div class="testimonials__content">
        <div class="testimonials__head w-105">
          <img src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/quote.svg"
            alt="Quote" class="testimonials__quote">
          <h2 class="testimonials__title">What investors like you are saying about Zou</h2>
        </div>
        <div class="testimonials__body">
          <div class="testimonials__list">
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/1.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> Fernando Soler</h4>
                  <h4 class="testimonial__title">Telecommunication Engineer</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/2.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> Ilone Pickford</h4>
                  <h4 class="testimonial__title">Head of Agrogofund Groups</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/3.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> John Doe</h4>
                  <h4 class="testimonial__title">Software Engineer</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/2.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> Ilone Pickford</h4>
                  <h4 class="testimonial__title">Head of Agrogofund Groups</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/1.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> Fernando Soler</h4>
                  <h4 class="testimonial__title">Telecommunication Engineer</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/2.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> Ilone Pickford</h4>
                  <h4 class="testimonial__title">Head of Agrogofund Groups</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/3.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> John Doe</h4>
                  <h4 class="testimonial__title">Software Engineer</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/2.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> Ilone Pickford</h4>
                  <h4 class="testimonial__title">Head of Agrogofund Groups</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,
                “
              </p>
            </div>
            <div class="testimonial">
              <div class="testimonial__profile">
                <div class="testimonial__img">
                  <img
                    src="https://raw.githubusercontent.com/mustafadalga/farm-landing-page/master/assets/img/testimonials/3.png"
                    alt="Testimonial">
                </div>
                <div class="testimonial__info">
                  <h4 class="testimonial__name"> John Doe</h4>
                  <h4 class="testimonial__title">Software Engineer</h4>
                </div>
              </div>
              <p class="testimonial__description">
                “ At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium “
              </p>
            </div>
          </div>
        </div>
        <div class="testimonials__footer  w-105">
          <div class="testimonials__directions">
            <button class="btn__testimonials btn__testimonials__prev disable">
              <i class="fa fa-chevron-left"></i>
            </button>
            <button class="btn__testimonials btn__testimonials__next">
              <i class="fa fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
    </section> -->

    <footer class="footer">
      <p class="footer_copyright">
        © Copyright 2024. Sudhar.
      </p>
    </footer>
  </div>
  <script src="assets/js/main.js" type="module"></script>
  <script>
    /* Navigation Menu */
    var nav = document.querySelector('.header__nav__content');
    var hamburger_menu = document.querySelector('.hamburger-menu-wrap')
    var close_icon = document.querySelector('.nav-close-icon');
    hamburger_menu.addEventListener('click', (event) => {
      nav.classList.add('open')
    });
    close_icon.addEventListener('click', (event) => {
      nav.classList.remove('open')
    })

    /* How To Works Section */

    const worksSection = document.querySelector('.works__content');
    const progressbar = worksSection.querySelector('.form_progressbar');
    const progressbarSteps = progressbar.querySelectorAll('.progressbar__step')
    const firstStep = worksSection.querySelector('.first_step')

    progressbar.addEventListener('click', (event) => {
      if (event.target && event.target.nodeName == "LI") {
        const dataStep = event.target.getAttribute('data-step');
        for (let index = dataStep - 1; index < progressbarSteps.length; index++) {
          progressbarSteps[index].classList.remove('active');
        }
        for (let index = dataStep - 1; index > 0; index--) {
          progressbarSteps[index].classList.add('active');
        }
        event.target.classList.add('active')
        firstStep.style.marginLeft = `-${(dataStep - 1) * 100}%`
      }
    });

    /* End How To Works Section */


    /*Testimonial Section */

    const testimonialsSection = document.querySelector('.testimonials__content');
    const testimonialContainer = testimonialsSection.querySelector('.testimonials__list')
    const nextBtn = testimonialsSection.querySelector('.btn__testimonials__next');
    const prevBtn = testimonialsSection.querySelector('.btn__testimonials__prev');

    const testimonials = testimonialContainer.querySelectorAll('.testimonial')
    let testimonialsWidth, testimonialWidth;
    let testimonialIndex = 0;
    const gridGap = 25;
    let limit = getLimit();


    window.addEventListener("resize", () => {
      limit = getLimit();
    })
    checkLimitForBtnStatus()
    nextBtn.addEventListener('click', moveToNextSlide)
    prevBtn.addEventListener('click', moveToPrevSlide)


    function moveToNextSlide() {
      if (!isContinue({ direction: true })) return;
      testimonialIndex++;
      testimonialContainer.style.transform = `translateX(${-testimonialWidth * testimonialIndex}px)`
      testimonialContainer.style.transition = ".7s"
    }

    function moveToPrevSlide() {
      if (!isContinue({ direction: false })) return;
      testimonialIndex--;
      testimonialContainer.style.transform = `translateX(${-testimonialWidth * testimonialIndex}px)`
      testimonialContainer.style.transition = ".7s"
    }

    const isContinue = (args) => {
      if (args.direction) {
        if (testimonialIndex < limit) {
          checkTestimonialFinish(args.direction, nextBtn, prevBtn)
          return true;
        } else {
          updateBtnStatus(nextBtn, true)
          updateBtnStatusByLimit(prevBtn)
          return false;
        }
      } else {
        if (testimonialIndex > 0) {
          checkTestimonialFinish(args.direction, prevBtn, nextBtn)
          return true;
        } else {
          updateBtnStatus(prevBtn, true)
          updateBtnStatusByLimit(nextBtn)
          return false;
        }
      }
    }

    function getElementsWidth() {
      return [testimonialContainer.clientWidth,
      testimonials[testimonialIndex].clientWidth + gridGap
      ]
    }

    function getLimit() {
      [testimonialsWidth, testimonialWidth] = getElementsWidth();
      let testimonialCountPerWrap = testimonialsWidth / testimonialWidth
      return Math.round(testimonials.length - testimonialCountPerWrap)
    }

    function checkLimitForBtnStatus() {
      if (limit == 0) {
        nextBtn.classList.add('disable');
      }
    }

    function updateBtnStatus(btn, status) {
      if (status) {
        btn.classList.add('disable')
      } else {
        btn.classList.remove('disable')
      }
    }

    function checkTestimonialFinish(direction, btn1, btn2) {
      const status = direction ? (testimonialIndex + 1 < limit) : (testimonialIndex - 1 > 0)
      if (status) {
        updateBtnStatus(btn1, false)
      } else {
        updateBtnStatus(btn1, true)
      }
      updateBtnStatus(btn2, false)
    }

    function updateBtnStatusByLimit(btn) {
      if (limit != 0) {
        updateBtnStatus(btn, false)
      }
    }


    /*End Testimonial Section */
  </script>
</body>

</html>