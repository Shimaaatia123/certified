<?php

return [

    'hero'                  => [

        'eyebrow'              => 'Secure Communication Channel',

        'title'                => 'Let’s Start a Trusted Conversation.',

        'description'          =>
        'Have a question, need verification support, or want to work with Certified? We’re ready to listen.',

        'cta'                  => 'Start a Conversation',

        'trust_label'          => 'Communication status',

        'online'               => 'System online',

        'secure'               => 'Secure communication',

        'system_online'        => 'System online',

        'channel_label'        => 'Communication Channel',

        'channel_subtitle'     => 'Secure connection initialized',

        'signal'               => 'Signal',

        'active'               => 'Active',

        'identity'             => 'Identity',

        'message'              => 'Message',

        'response'             => 'Response',

        'ready'                => 'Ready',

        'encryption'           => 'Encryption',

        'status'               => 'Status',

        'connected'            => 'Connected',

        'response_ready'       => 'Response channel ready',

        'secure_communication' => 'Secure communication',

        'signal_aria'          => 'Secure communication channel status',

    ],

    'communication_flow'    => [

        'eyebrow'           => 'SECURE COMMUNICATION',

        'title'             => 'Secure Communication in Motion',

        'description'       => 'Every message follows a protected digital path, from the moment it is received to the moment it reaches the right destination.',

        'source'            => 'YOUR MESSAGE',

        'source_status'     => 'READY TO TRANSMIT',

        'core'              => 'SECURE CORE',

        'core_state'        => 'CHANNEL ACTIVE',

        'system_status'     => 'SECURE CHANNEL OPERATIONAL',

        'protected_channel' => 'PROTECTED TRANSMISSION',

        'steps'             => [

            'received'  => [
                'status'      => '01 · RECEIVED',
                'title'       => 'Message Received',
                'description' => 'Your communication enters the protected channel.',
            ],

            'encrypted' => [
                'status'      => '02 · ENCRYPTED',
                'title'       => 'Data Secured',
                'description' => 'Your message is prepared for protected transmission.',
            ],

            'verified'  => [
                'status'      => '03 · VERIFIED',
                'title'       => 'Source Verified',
                'description' => 'Communication context is checked before routing.',
            ],

            'routed'    => [
                'status'      => '04 · ROUTED',
                'title'       => 'Smart Routing',
                'description' => 'The message is directed toward the appropriate destination.',
            ],

            'delivered' => [
                'status'      => '05 · DELIVERED',
                'title'       => 'Securely Delivered',
                'description' => 'The communication reaches its intended destination.',
            ],

        ],

    ],

    'conversation_terminal' => [

        'eyebrow'       => 'SECURE CONTACT',

        'title'         => 'Start a Secure Conversation',

        'description'   =>
        'Send your message through a direct and protected communication channel.',

        'message_label' => 'MESSAGE TERMINAL',

        'message_title' => 'Compose your message',

        'live'          => 'CHANNEL LIVE',

        'fields'        => [

            'name'                => 'Your Name',
            'name_placeholder'    => 'Enter your name',

            'email'               => 'Email Address',
            'email_placeholder'   => 'Enter your email',

            'subject'             => 'Subject',
            'subject_placeholder' => 'What would you like to discuss?',

            'message'             => 'Message',
            'message_placeholder' => 'Write your message here...',

        ],

        'submit'        => 'INITIATE SECURE MESSAGE',
        'sending'     => 'TRANSMITTING...',

        'status'        => [

            'label'     => 'COMMUNICATION STATUS',

            'title'     => 'Terminal Status',

            'channel'   => 'Channel',
            'active'    => 'ACTIVE',

            'identity'  => 'Identity',
            'waiting'   => 'WAITING...',

            'security'  => 'Security',
            'protected' => 'PROTECTED',

            'delivery'  => 'Delivery',
            'ready'     => 'READY',

        ],

        'security'      => [
            

            'title'       => 'Protected Communication',

            'description' =>
            'Your message is prepared through a controlled communication channel.',

        ],

        'sending_status' => 'Preparing secure transmission...',

    ],

];
