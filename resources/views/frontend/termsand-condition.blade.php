
@extends('frontend.layouts.app')

@section('content')
<main class="main mt-6 single-product">
    {{-- <div class="container">
        <div class="row">
            <h2 class="text-center">Heshelghor.com</h2>
            <h2>Terms and Conditions</h2>

        </div>
        <div class="row">
            <h5>1/  INTRODUCTION</h5>
            <p>Welcome to Heshelghor.com. The Main Company is known as Catalysts Wings Limited and Heshelghor.com is a subordinate wing of the Mother Company Catalysts Wings Limited.Heshelghor.com also hereby known as "Heshelghor". We are an online Business Platform and these are the terms and conditions governing your access and use of Heshelghor along with its related sub-domains, sites, mobile app, services and tools (the "Site"). By using the Site, you hereby accept these terms and conditions (including the linked information herein) and represent that you agree to comply with these terms and conditions (the "User Agreement"). This User Agreement is deemed effective upon your use of the Site which signifies your acceptance of these terms. If you do not agree to be bound by this User Agreement please do not access, register with or use this Site. This Site is owned and operated by <strong>Heshelghor.com, a company incorporated under the Companies Act, 1994, (Trade License Number: 06034 ).</strong></p>
            <p>The Site reserves the right to change, modify, add, or remove portions of these Terms and Conditions at any time without any prior notification. Changes will be effective when posted on the Site with no other notice provided. Please check these Terms and Conditions regularly for updates. Your continued use of the Site following the posting of changes to the Terms and Conditions of use constitutes your acceptance of those changes.</p>
        </div>
        <div class="row">

        </div>
    </div> --}}
    <div class="container">
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; text-align: center; background: white;">
            <strong><span
                    style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Heshelghor.com</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; text-align: center; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Terms and
                    Conditions</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>1/
                    &nbsp;INTRODUCTION</span></strong>
        </p>
        <p style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;"><span
                style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;color:#333333;'>Welcome to
                Heshelghor.com.Heshelghor.com also hereby known as &quot;Heshelghor&quot;. We are an online E-commerce
                Business Platform and these are the terms and conditions governing your access and use of Heshelghor
                along with its related sub-domains, sites, mobile app, services and tools (the &quot;Site&quot;). By
                using the Site, you hereby accept these terms and conditions and represent that you agree to comply with
                these terms and conditions (the &quot;Privacy Agreement&quot;). This Agreement is deemed effective upon
                your use of the Site which signifies your acceptance of these terms. If you do not agree to be bound by
                this User Agreement please do not access, register with or use this Site. This Site is owned and
                operated by&nbsp;Heshelghor.com, a company incorporated under the Companies Act, 1994, (Trade License
                Number: 06034).</span></p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>The Site reserves the right
                to change, modify, add, or remove portions of these Terms and Conditions at any time without any prior
                notification. Changes will be effective when posted on the Site with no other notice provided. Please
                check these Terms and Conditions regularly for updates. Your continued use of the Site following the
                posting of changes to the Terms and Conditions of use privacy policy constitutes your acceptance of
                those changes.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>2/ CONDITIONS OF
                    USE</span></strong>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="1" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">PRIVACY</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
        <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Please review our <a href="{{route('privacypolicy')}}">Privacy Agreement</a>, which also governs your visit to the Site. The personal information/data provided to us by
                you or your use of the Site will be treated as strictly confidential, in accordance with the Privacy
                Agreement and applicable laws and regulations. If you object to your information being transferred or
            used in the manner specified in the <a href="{{route('privacypolicy')}}">Privacy Agreement</a>, please do not use the Site.</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="2" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;">YOUR ACCOUNT</span></strong>
                </li>
            </ol>
        </div>
        <p style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;"><span
                style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;color:#333333;'>To access
                certain services offered by the Heshelghor platform, we may require that you create an account with us
                or provide personal information to complete the creation of an account. We may at any time in our sole
                and absolute discretion, invalidate the username and/or password without giving any reason or prior
                notice and shall not be liable or responsible for any losses suffered by, caused by, arising out of, in
                connection with or by reason of such request or invalidation.</span></p>
        <p style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;"><span
                style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;color:#333333;'>You are
                responsible for maintaining the confidentiality of your user identification, password, account details
                and related private information. You agree to accept this responsibility and ensure your account and its
                related details are maintained securely at all times and all necessary steps are taken to prevent misuse
                of your account. You should inform us immediately if you have any reason to believe that your password
                has become known to anyone else, or if the password is being, or is likely to be, used in an
                unauthorized manner. You agree and acknowledge that you shall be bound by and agree to fully indemnify
                us against any and all losses arising from the use of or access to the Site through your account.</span>
        </p>
        <p style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;"><span
                style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;color:#333333;'>Please ensure
                that the details you provide us with are correct and complete at all times. You are obligated to update
                details about your account in real-time by accessing your account online. For pieces of information, you
                are not able to update by accessing Your Account on the Site, you must inform us via our customer
                service communication channels to assist you with these changes. We reserve the right to refuse access
                to the Site, terminate accounts, or remove or edit content at any time without prior notice to you. You
                hereby agree to change your password from time to time and to keep your account secure and also shall be
                responsible for the confidentiality of your account and liable for any disclosure or use (whether such
                use is authorized or not) of the username and/or password. You shall not use a false e-mail address,
                pretend to be someone other than yourself or otherwise mislead us or third parties as to the origin of
                any Submissions.</span></p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="3" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">COMMUNICATION</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>You agree, understand and
                acknowledge that the Site is an online platform that enables you to purchase products listed at the
                price indicated therein at any time from any location using a payment method of your choice. You further
                agree and acknowledge that we are only a facilitator and cannot be a party to or control in any manner
                any transactions on the Site or on a payment gateway as made available to you by an independent service
                provider. Accordingly, the contract of sale of products on the Site shall be a strictly bipartite
                contract between you and the sellers on our Site while the payment processing occurs between you, the
                service provider and in case of prepayments with electronic cards your issuer bank. Accordingly, the
                contract of payment on the Site shall be strictly a bipartite contract between you and the service
                provider as listed on our Site.</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="4" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">CONTINUED AVAILABILITY OF THE
                            SITE</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We will do our utmost to
                ensure that access to the Site is consistently available and is uninterrupted and error-free. However,
                due to the nature of the Internet and the nature of the Site, this cannot be guaranteed. Additionally,
                your access to the Site may also be occasionally suspended or restricted to allow for repairs,
                maintenance, or the introduction of new facilities or services at any time without prior notice. We will
                attempt to limit the frequency and duration of any such suspension or restriction.</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="5" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style='font-family:"Times New Roman",serif;'>LICENSE TO ACCESS THE
                            SITE</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We require that by accessing
                the Site, you confirm that you can form legally binding contracts and therefore you confirm that you are
                at least 18 years of age or are accessing the Site under the supervision of a parent or legal guardian.
                We grant you a non-transferable, revocable and non-exclusive license to use the Site, in accordance with
                the Terms and Conditions described herein, for the purposes of shopping for personal items and services
                as listed to be sold on the Site. Commercial use or use on behalf of any third party is prohibited,
                except as explicitly permitted by us in advance. If you are registering as a business entity, you
                represent that you have the authority to bind that entity to this User Agreement and that you and the
                business entity will comply with all applicable laws relating to online trading. No person or business
                entity may register as a member of the Site more than once. Any breach of these Terms and Conditions
                shall result in the immediate revocation of the license granted in this paragraph without notice to
                you.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>The content provided on this
                Site is solely for informational purposes. Product representations including price, available stock,
                features, add-ons and any other details as expressed on this Site are the responsibility of the vendors
                displaying them and is not guaranteed as completely accurate by us.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We grant you a limited
                license to access and make personal use of this Site, but not to download (excluding page caches) or
                modify the Site or any portion of it in any manner. This license does not include any resale or
                commercial use of this Site or its contents; any collection and use of any product listings,
                descriptions, or prices; any derivative use of this Site or its contents; any downloading or copying of
                account information for the benefit of another seller; or any use of data mining, robots, or similar
                data gathering and extraction tools.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>You may not frame or use
                framing techniques to enclose any trademark, logo, or other proprietary information (including images,
                text, page layout, or form) without our express written consent. You may not use any meta tags or any
                other text utilizing our name or trademark without our express written consent, as applicable. Any
                unauthorized use terminates the permission or license granted by us to you for access to the Site with
                no prior notice. You may not use our logo or other proprietary graphic or trademark as part of an
                external link for commercial or other purposes without our express written consent, as may be
                applicable.<br>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>You agree and undertake not
                to perform restricted activities listed within this section; undertaking these activities will result in
                immediate cancellation of your account, services, reviews, orders or any existing incomplete transaction
                with us and in severe cases may also result in a legal action:<br>&nbsp;</span>
        </p>
        <ul style="list-style-type: disc;margin-left:-0.25in;">
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Refusal to comply with
                    the Terms and Conditions described herein or any other guidelines and policies related to the use of
                    the Site is available on the Site at all times.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Impersonate any person
                    or entity or falsely state or otherwise misrepresent your affiliation with any person or
                    entity.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Use the Site for illegal
                    purposes.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Attempt to gain
                    unauthorized access to or otherwise interfere or disrupt other computer systems or networks
                    connected to the Platform or Services.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Interfere with
                    another&rsquo;s utilization and enjoyment of the Site.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Post, promote or
                    transmit through the Site any prohibited materials as deemed illegal by The People&apos;s Republic
                    of Bangladesh.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Use or upload, in any
                    way, any software or material that contains, or which you have reason to suspect contains, viruses,
                    damaging components, malicious code or harmful components which may impair or corrupt the
                    Site&rsquo;s data or damage or interfere with the operation of another Customer&rsquo;s computer or
                    mobile device or the Site and use the Site other than in conformance with the acceptable use
                    policies of any connected computer networks, any applicable Internet standards and any other
                    applicable laws.</span></li>
        </ul>
        <p
            style="margin: 0in 0in 0.0001pt 0.25in; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="6" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">YOUR CONDUCT</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>You must not use the website
                in any way that causes, or is likely to cause, the Site or access to it to be interrupted, damaged or
                impaired in any way. You must not engage in activities that could harm or potentially harm the Site, its
                employees, officers, representatives, stakeholders or any other party directly or indirectly associated
                with the Site or access to it to be interrupted, damaged or impaired in any way. You understand that
                you, and not us, are responsible for all electronic communications and content sent from your computer
                to us and you must use the Site for lawful purposes only. You are strictly prohibited from using the
                Site</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'> for fraudulent purposes,
                or in connection with a criminal offence or other unlawful activity</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'> &nbsp;to send, use or
                reuse any material that does not belong to you; or is illegal, offensive (including but not limited to
                material that is sexually explicit content or which promotes racism, bigotry, hatred or physical harm),
                deceptive, misleading, abusive, indecent, harassing, blasphemous, defamatory, libellous, obscene,
                pornographic, pedophilic or menacing; ethnically objectionable, disparaging or in breach of copyright,
                trademark, confidentiality, privacy or any other proprietary information or right; or is otherwise
                injurious to third parties, or relates to or promotes money laundering or gambling; or is harmful to
                minors in any way, or impersonates another person; or threatens the unity, integrity, security or
                sovereignty of Bangladesh or friendly relations with foreign States; or objectionable or otherwise
                unlawful in any manner whatsoever; or which consists of or contains software viruses, political
                campaigning, commercial solicitation, chain letters, mass mailings or any &quot;spam&rdquo;</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'> Use the Site for illegal
                purposes.</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'> to cause annoyance,
                inconvenience or needless anxiety</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'> for any other purposes
                that are other than what is intended by us.</span><span
                style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We list thousands of
                products for sale offered by numerous sellers on the Site and host multiple comments on listings, it is
                not possible for us to be aware of the contents of each product listed for sale, or each comment or
                review that is displayed. Accordingly, we operate on a &quot;claim, review and takedown&quot;
                basis.</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="7" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style='font-family:"Times New Roman",serif;'>CLAIMS AGAINST OBJECTIONABLE
                            CONTENT</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We list thousands of
                products for sale offered by numerous sellers on the Site and host multiple comments on listings, it is
                not possible for us to be aware of the contents of each product listed for sale, or each comment or
                review that is displayed. Accordingly, we operate on a &quot;claim, review and takedown&quot; basis. If
                you believe that any content on the Site is illegal, offensive (including but not limited to material
                that is sexually explicit content or which promotes racism, bigotry, hatred or physical harm),
                deceptive, misleading, abusive, indecent, harassing, blasphemous, defamatory, libellous, obscene,
                pornographic, pedophilic or menacing; ethnically objectionable, disparaging; or is otherwise injurious
                to third parties; or relates to or promotes money laundering or gambling; or is harmful to minors in any
                way; or impersonates another person; or threatens the unity, integrity, security or sovereignty of
                Bangladesh or friendly relations with foreign States; or objectionable or otherwise unlawful in any
                manner whatsoever; or which consists of or contains software viruses, (&quot; objectionable content
                &quot;), please notify us immediately by following by writing to us on info@heshelghor.com. We will make
                all practical endeavours to investigate and remove valid objectionable content complained about within a
                reasonable amount of time.<br>&nbsp;<br>&nbsp;Please ensure to provide your name, address, contact
                information and as many relevant details of the claim including the name of the objectionable content
                party, instances of objection, and proof of objection amongst others. Please note that providing
                incomplete details will render your claim invalid and unusable for legal purposes</span><span
                style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="8" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style='font-family:"Times New Roman",serif;'>DISCLAIMER</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>You acknowledge and
                undertake that you are accessing the services on the Site and transacting at your own risk and are using
                your best and prudent judgment before entering into any transactions through the Site. We shall neither
                be liable nor responsible for any actions or inactions of sellers nor any breach of conditions,
                representations or warranties by the sellers or manufacturers of the products and hereby expressly
                disclaim all responsibility and liability in that regard. We shall not mediate or resolve any dispute or
                disagreement between you and the sellers or manufacturers of the products.<br>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We shall neither be liable
                nor responsible for any actions or inactions of any other service provider as listed on our Site which
                includes but is not limited to payment providers, instalment offerings, and warranty services amongst
                others.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol style="margin-bottom:0in;list-style-type: lower-roman;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">COMMUNICATING WITH US</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>When you visit the Site or
                send e-mails to us, you are communicating with us electronically. You will be required to provide a
                valid phone number while placing an order with us. We may communicate with you by e-mail, SMS, phone
                call or by posting notices on the Site or by any other mode of communication we choose to employ. For
                contractual purposes, you consent to receive communications (including transactional, promotional and/or
                commercial messages), from us with respect to your use of the website (and/or placement of your order)
                and agree to treat all modes of communication with the same importance.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="10" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">LOSSES</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We will not be responsible
                for any business or personal losses (including but not limited to loss of profits, revenue, contracts,
                anticipated savings, data, goodwill, or wasted expenditure) or any other indirect or consequential loss
                that is not reasonably foreseeable to both you and us when you commenced using the Site.</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ol start="11" style="margin-bottom:0in;list-style-type: lower-alpha;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style='font-family:"Times New Roman",serif;'>AMENDMENTS TO CONDITIONS OR ALTERATIONS
                            OF SERVICE AND RELATED PROMISE</span></strong>
                </li>
            </ol>
        </div>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Welcome to Heshelghor.com.
                The Main Company is known as Catalysts Wings Limited and Heshelghor.com is a subordinate wing of the
                Mother Company Catalysts Wings Limited. We reserve the right to make changes to the Site, its policies,
                these terms and conditions and any other publicly displayed condition or service promise at any time.
                You will be subject to the policies and terms and conditions in force at the time you used the Site
                unless any change to those policies or these conditions is required to be made by law or government
                authority (in which case it will apply to orders previously placed by you). If any of these conditions
                is deemed invalid, void, or for any reason unenforceable, that condition will be deemed severable and
                will not affect the validity and enforceability of any remaining condition.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>l.
                    WAIVER</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>You acknowledge and
                recognize that we are a private commercial enterprise and reserve the right to conduct business to
                achieve our objectives in a manner we deem fit. You also acknowledge that if you breach the conditions
                stated on our Site and we take no action, we are still entitled to use our rights and remedies in any
                other situation where you breach these conditions.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>m.
                    TERMINATION</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>In addition to any other
                legal or equitable remedies, we may, without prior notice to you, immediately terminate the Terms and
                Conditions or revoke any or all of your rights granted under the Terms and Conditions. Upon any
                termination of this Agreement, you shall immediately cease all access to and use of the Site and we
                shall, in addition to any other legal or equitable remedies, immediately revoke all password(s) and
                account identification issued to you and deny your access to and use of this Site in whole or in part.
                Any termination of this agreement shall not affect the respective rights and obligations (including
                without limitation, payment obligations) of the parties arising before the date of termination. You
                furthermore agree that the Site shall not be liable to you or to any other person as a result of any
                such suspension or termination. If you are dissatisfied with the Site or with any terms, conditions,
                rules, policies, guidelines, or practices in operating the Site, your sole and exclusive remedy is to
                discontinue using the Site.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>n. GOVERNING
                    LAW</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>These terms and conditions
                are governed by and construed in accordance with the laws of The People&apos;s Republic of Bangladesh.
                You agree that the courts, tribunals and/or quasi-judicial bodies located in Dhaka, Bangladesh shall
                have the exclusive jurisdiction on any dispute arising inside Bangladesh under this Agreement.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>o. OUR
                    SOFTWARE</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Our software includes any
                software (including any updates or upgrades to the software and any related documentation) that we make
                available to you from time to time for your use in connection with the Site (the
                &quot;Software&quot;).<br>&nbsp;<br>&nbsp;You may use the Software solely for purposes of enabling you
                to use and enjoy our services as permitted by the Terms and Conditions and any related applicable terms
                as available on the Site. You may not incorporate any portion of the Software into your own programs or
                compile any portion of it in combination with your own programs, transfer it for use with another
                service, or sell, rent, lease, lend, loan, distribute or sub-license the Software or otherwise assign
                any rights to the Software in whole or in part. You may not use the Software for any illegal purpose. We
                may cease providing you service and we may terminate your right to use the Software at any time. Your
                rights to use the Software will automatically terminate without notice from us if you fail to comply
                with any of the Terms and Conditions listed here or across the Site.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>3/ CONDITIONS OF
                    SALE (BETWEEN SELLERS AND CUSTOMERS)</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Please read these conditions
                carefully before placing an order for any products with the Sellers on the Site. These conditions
                signify your agreement to be bound by these conditions. This section deals with conditions relating to
                the sale of products or services on the Site.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>a. THE
                    CONTRACT</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Your order is a legal offer
                to the seller to buy the product or service displayed on our Site. When you place an order to purchase a
                product, any confirmations or status updates received prior to the dispatch of your order serve purely
                to validate the order details. The acceptance of your order is considered confirmed when the product is
                dispatched to you. If your order is dispatched in more than one package, you may receive separate
                dispatch confirmations. Upon time of placing the order, we indicate an approximate timeline that the
                processing of your order will take however we cannot guarantee this timeline to be rigorously precise in
                every instance as we are dependent on third-party service providers to preserve this commitment. All
                commercial/contractual terms are offered by and agreed to between you and the sellers alone and these
                terms include without limitation price, shipping costs, payment methods, payment terms, date, period and
                mode of delivery, warranties related to products and services and after-sales services related to
                products and services.</span><span
                style='font-size:16px;font-family:"Times New Roman",serif;'>&nbsp;</span><span
                style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Heshelghor does not have any
                control or does not determine or advise or in any way involve itself in the offering or acceptance of
                such commercial/contractual terms between you and the Sellers. The seller retains the right to cancel
                any order informing heshelghor at its sole discretion prior to dispatch. We will ensure that there is a
                timely intimation to you of such cancellation via email or SMS. Any prepayments made in case of such
                cancellation(s), shall be refunded to you within the time frames stipulated.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span
                    style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>b.RETURNS</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Please review our Returns
                Policy.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>c. PRICING,
                    AVAILABILITY AND ORDER PROCESSING</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We do not offer price
                matching for any items sold by any seller on our Site or other websites. All prices are listed in
                Bangladeshi Taka (BDT) and are inclusive of VAT and are listed on the Site by the seller that is selling
                the product or service. Items in your Shopping Cart will always reflect the most recent price displayed
                on the item&apos;s product detail page. Please note that this price may differ from the price shown for
                the item when you first placed it in your cart. Placing an item in your cart does not reserve the price
                shown at that time. It is also possible that an item&apos;s price may decrease between the time you
                place it in your basket and the time you purchase it.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We are determined to provide
                the most accurate pricing information on the Site to our users; however, errors may still occur, such as
                cases when the price of an item is not displayed correctly on the Site. As such, we reserve the right to
                refuse or cancel any order. In the event that an item is mispriced, we may, at our own discretion,
                either contact you for instructions or cancel your order and notify you of such
                cancellation.<br>&nbsp;We shall have the right to refuse or cancel any such orders whether or not the
                order has been confirmed and your prepayment processed. If such a cancellation occurs on your prepaid
                order, our policies for refund will apply. Please note that Heshelghor possesses 100% right on the
                refund amount. Usually, the refund amount is calculated based on the customer&rsquo;s paid price after
                deducting any sort of discount and shipping fee.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Please note that there are
                cases when an order cannot be processed for various reasons. The Site reserves the right to refuse or
                cancel any order for any reason at any given time. You may be asked to provide additional verifications
                or information, including but not limited to phone number and address before we accept the order.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>In order to avoid any fraud
                with credit or debit cards, we reserve the right to obtain validation of your payment details before
                providing you with the product and to verify the personal information you shared with us. This
                verification can take the shape of an identity, place of residence, or banking information check. The
                absence of an answer following such an inquiry will automatically cause the cancellation of the order
                within a reasonable timeline. We reserve the right to proceed to direct cancellation of an order for
                which we suspect a risk of fraudulent use of banking instruments or other reasons without prior notice
                or any subsequent legal liability.<br>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Refund
                    Acknowledgement Voucher&nbsp;</span></strong>
        </p>
        <ul style="list-style-type: disc;margin-left:-0.25in;">
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Refund Acknowledgement
                    vouchers can be redeemed on our Website, as full or part payment of products from our Website within
                    the given timeline.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Refund Acknowledgement
                    vouchers cannot be used from a different account.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Vouchers are not
                    replaceable if expired.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>Refund Acknowledgement
                    Voucher code can be applied only once. The residual amount of the Refund Voucher after applying it
                    once, if any, will not be refunded and cannot be used for the next purchases even if the value of
                    the order is smaller than the remaining voucher value.</span></li>
        </ul>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Security and
                    Fraud</span></strong>
        </p>
        <ul style="list-style-type: disc;margin-left:12.5px;">
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>When you use a voucher,
                    you warrant to Heshelghor that you are the duly authorized recipient of the voucher and that you are
                    using it in good faith.</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>If you redeem, attempt
                    to redeem or encourage the redemption of the voucher to obtain discounts to which you are not
                    entitled you may be committing a civil or criminal offence</span></li>
            <li style="line-height: 2;"><span
                    style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>If we reasonably believe
                    that any voucher is being used unlawfully or illegally, we may reject or cancel any voucher/order
                    and you agree that you will have no claim against us in respect of any rejection or cancellation.
                    Heshelghor reserves the right to take any further action it deems appropriate in such
                    instances.</span></li>
        </ul>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'><br> <strong>d. RESELLING
                    HESHELGHOR PRODUCTS</strong></span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>Reselling Heshelghor
                products for business purposes is strictly prohibited. If any unauthorized personnel are found
                committing the above act, legal action may be taken against him/her.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'><br> <strong>e.
                    TAXES</strong></span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>You shall be responsible for
                payment of all fees/costs/charges associated with the purchase of products from the Site and you agree
                to bear any and all applicable taxes as per prevailing law.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>f. REPRESENTATIONS
                    AND WARRANTIES</span></strong>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>We do not make any
                representation or warranty as to specifics (such as quality, value, saleability, etc) of the products or
                services listed to be sold on the Site when products or services are sold by third parties. We do not
                implicitly or explicitly support or endorse the sale or purchase of any products or services on the
                Site. We accept no liability for any errors or omissions, whether on behalf of itself or third parties.
                &nbsp; &nbsp; We are not responsible for any non-performance or breach of any contract entered into
                between you and the sellers. We cannot and do not guarantee your actions or those of the sellers as they
                conclude transactions on the Site. We are not required to mediate or resolve any dispute or disagreement
                arising from transactions occurring on our Site.<br>&nbsp;<br>&nbsp;Pricing on any product(s) or related
                information as reflected on the Site may be due to some technical issue, typographical error or other
                reason by incorrect as published and as a result, you accept that in such conditions the seller or the
                Site may cancel your order without prior notice or any liability arising as a result. Any prepayments
                made for such orders will be refunded to you per our refund policy as stipulated.</span>
        </p>
        <p
            style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>g. DELIVERY AND
                    REFUND TIMELINE</span></strong>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0in;list-style-type: disc;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">Stock availability:</span></strong><span
                        style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>&nbsp;The orders are
                        subject to the availability of stock.</span>
                </li>
            </ul>
        </div>
        <p
            style="margin: 0in 0in 0.0001pt 0.25in; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
        </p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0in;list-style-type: disc;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">Delivery Timeline:</span></strong><span
                        style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>&nbsp;According to Bangladesh Bank Guideline, Heshelghor.com usual Delivery timeframe Inside Dhaka: is 3-5 working days (max), and Outside Dhaka: is 7-10 working days (max). The delivery might take longer than the usual timeframe due to force majeure event which includes, but are not limited to, political unrest, political event, national/public holidays, etc.</span>
                </li>
            </ul>
        </div>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <br>
        </p>
        <ul style="margin-bottom:0in;list-style-type: disc;margin-left:-0.25in;">
            <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                <strong><span style="font-size:12.0pt;color:#333333;">Cancellation:</span></strong><span
                    style='font-family:"Times New Roman",serif;'>&nbsp;Heshelghor.com retains the qualified right to
                    cancel any order at its sole discretion prior to dispatch and for any reason which may include but
                    is not limited to, the product being mispriced, out of stock, expired, defective, malfunctioned and
                    containing incorrect information or description arising out of technical or typographical error or
                    for any other reason.</span><span
                    style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;color:#333333;'>&nbsp;</span>
            </li>
        </ul>
        <p style="line-height: 2;"></p>
        <div
            style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt;margin-left:0in;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
            <ul style="margin-bottom:0in;list-style-type: disc;margin-left:-0.25in;">
                <li style="margin: 0in 0in 8pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif;">
                    <strong><span style="font-size:12.0pt;color:#333333;">Refund Timeline:</span></strong><span
                        style='font-family:"Times New Roman",serif;font-size:12.0pt;color:#333333;'>&nbsp;</span><span
                        style='font-family:"Times New Roman",serif;font-size:16px;'>If there is any problem with the
                        product after receiving the purchased product from the platform of Heshelghor within 12 (twelve)
                        hours you have to complain by registering in the complaint form on the Heshelghor.com
                        website/App. Within a maximum of 7(seven) working days to receive a product change or a full
                        refund, the product must be returned to the head office of Heshelghor.com at your own risk.
                        Change of product or full price will be paid within 7 to 10(seven-ten) working days if the
                        product is deemed correct by verification and selection.</span><span
                        style='font-family:"Times New Roman",serif;'>&nbsp;Provided that the received cashback amount,
                        if any, will be adjusted with the refund amount.</span>
                </li>
            </ul>
        </div>
        <p
            style="margin: 0in 0in 0.0001pt; line-height: 2; font-size: 15px; font-family: Calibri, sans-serif; background: white;">
            <span style='font-size:16px;font-family:"Times New Roman",serif;color:#333333;'><br> you confirm that the
                product(s) or service(s) ordered by you are purchased for your internal/personal consumption and not for
                commercial resale. You authorize us to declare and provide a declaration to any governmental authority
                on your behalf stating the aforesaid purpose for your orders on the Site. The Seller or the Site may
                cancel an order wherein the quantities exceed the typical individual consumption. This applies both to
                the number of products ordered within a single order and the placing of several orders for the same
                product where the individual orders comprise a quantity that exceeds the typical individual consumption.
                What comprises a typical individual&apos;s consumption quantity limit shall be based on various factors
                and at the sole discretion of the Seller or ours and may vary from individual to individual.</span>
        </p>
    </div>

</main>
@endsection
