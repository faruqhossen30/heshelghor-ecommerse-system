
@extends('frontend.layouts.app')

@section('content')
    <main class="main mt-6 single-product">
        <div class="container">
            <div class="row">
                <h2>About Us</h2>
                <p>Welcome to Heshelghor.com also hereby known as "Heshelghor". Heshelghor.com is an online
                    Marketplace/E-commerce business platform. Heshelghor.com started its journey in 2019 with the delivery
                    of cooked food. In 2021 heshelghor.com has started its activities to globalize the business platform.
                </p>
                <p>Heshelghor.com’s main objective is to create employment also bring services to the people's doorsteps and
                    provide an opportunity for all businessmen to work on an online-based marketplace platform. Where
                    Businessmen can sell products as per their demand and buyers can easily buy their products online from
                    the store of their choice.</p>
                <p>Here people can buy their products from any store in the world. We simply make sure that the product is
                    delivered to the right person within the right time. Heshelghor.com has its own transportation system.
                    Heshelghor.com is working to give priority to the mother's feelings beyond business thoughts. An example
                    of this is our temperature-controlled transport system. By which we are doing the work of conveying the
                    home-cooked food to the person far away from the family in any part of the country. <br>
                    We are committed to establishing Heshelghor.com as the first international standard e-commerce in
                    Bangladesh. </p>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="testimonial">
                            <div class="testimonial-info">
                                <figure class="testimonial-author-thumbnail">
                                    <img src="{{ asset('frontend') }}/images/nira.jpeg" alt="user" width="50"
                                        height="50" style="border-radius: 50%">
                                </figure>
                                <cite>
                                    Late Nurjahan Islam Nira
                                    <span>Founder</span>
                                </cite>
                            </div>
                            <blockquote>Agni-Kanya of South Bengal the Late Nurjahan Islam Nira , the late chairman of
                                Jessore Sadar Upazila Parishad founded Henshelghar.com with the aim of creating employment
                                and bringing services to the doorsteps of the people. We are committed to fulfilling her
                                dream.
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="testimonial">
                            <div class="testimonial-info">
                                <figure class="testimonial-author-thumbnail">
                                    <img src="{{ asset('frontend') }}/images/nipa.jpeg" alt="user" width="50"
                                        height="50" style="border-radius: 50%">
                                </figure>
                                <cite>
                                    Nasrin Sultana Nipa
                                    <span>Founding member</span>
                                </cite>
                            </div>
                            <blockquote>Since the establishment of Heshelghor.com, we have transformed our organization into
                                an E-commerce business platform in 2021 with the aim of bringing every person in the world
                                under our service and creating a wide range of jobs. Only Henshelghar.com has been providing
                                the highest level of fidelity to online shopping.
                                Heshelghor.com has become a corporate name of success and prosperity as an E-commerce
                                business platform. We remain committed to the overall growth and development of our
                                organization. We are devoted to the sustainable economic growth of Bangladesh.
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card my-3">
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                              <tr>
                                <th scope="row">Head Office</th>
                                <td> : 58, Burhan Shah Road, Karbala, Jashore-7400
                                    Phone: +88 02 4777 63843 | Mobile: +8801318-760087</td>
                              </tr>
                              <tr>
                                <th scope="row">Corporate Office</th>
                                <td> : House# 43(2nd Floor), Road# 4/A, Dhanmondi, Dhaka-1205.
                                    Phone: +88 02 410 60363</td>
                              </tr>
                              <tr>
                                <th scope="row">Facebook</th>
                                <td> : https://www.facebook.com/heshelghorbangladesh</td>
                              </tr>
                              <tr>
                                <th scope="row">WhatsApp</th>
                                <td> : +88 01788950905</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- End Main -->
@endsection
