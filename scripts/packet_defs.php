<?php
const FIELD_TYPE_UINT8 	    = 'uint8_t';
const FIELD_TYPE_INT8 	    = 'int8_t';
const FIELD_TYPE_UINT16     = 'uint16_t';
const FIELD_TYPE_INT16 	    = 'int16_t';
const FIELD_TYPE_UINT32     = 'uint32_t';
const FIELD_TYPE_INT32      = 'int32_t';
const FIELD_TYPE_UINT64     = 'uint64_t';
const FIELD_TYPE_INT64      = 'int64_t';
const FIELD_TYPE_UARRAY     = 'uint8_t[]';
const FIELD_TYPE_ARRAY      = 'int8_t[]';
const FIELD_TYPE_VARIABLE   = 'variable';

$fieldSizes = [
	FIELD_TYPE_UINT8 	=> 1,
	FIELD_TYPE_INT8 	=> 1,
	FIELD_TYPE_UINT16   => 2,
	FIELD_TYPE_INT16 	=> 2,
	FIELD_TYPE_UINT32   => 4,
	FIELD_TYPE_INT32 	=> 4,
	FIELD_TYPE_UINT64   => 8,
	FIELD_TYPE_INT64 	=> 8,
	FIELD_TYPE_UARRAY   => -1,
	FIELD_TYPE_UARRAY 	=> -1,
];

/**
* Sahara Packet Definitions
*/
$packets['sahara'] = [
	'SaharaPacket' => [
		'skip' => true,
		'path' => 'qualcomm/packet'
	],
	'SaharaHelloRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'min_version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_command_packet_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'status' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'reserved' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT32] * 6,
			],
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandHello'
		]
	],
	'SaharaHelloResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'min_version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_command_packet_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'status' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'reserved' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT32] * 6,
			],
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandHelloResponse'
		]
	],
	'SaharaReadDataRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'image_id' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'offset' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		]
	],
	'SaharaReadDataResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'Packet',
		'extends_namespace' => 'OpenPST::Serial',
		'source'  => 'local',
		'fields'  => [
			'data' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
				'allowed_setters' => ['file','raw','string'],
				'allowed_getters' => ['vector','string'],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandReadData'
		]
	],
	'SaharaEndImageTransferResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'image_id' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'status' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		],
		'default_exends' => [
			'command' => 'kSaharaCommandEndImageTransfer'
		]
	],
	'SaharaDoneRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [],
		'default_exends' => [
			'command' => 'kSaharaCommandDone'
		]
	],
	'SaharaDoneResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [],
		'default_exends' => [
			'command' => 'kSaharaCommandDoneResponse'
		]
	],
	'SaharaResetRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [],
		'default_exends' => [
			'command' => 'kSaharaCommandReset'
		]
	],
	'SaharaResetResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [],
		'default_exends' => [
			'command' => 'kSaharaCommandResetResponse'
		]
	],
	'SaharaMemoryDebugRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		],
		'default_exends' => [
			'command' => 'kSaharaCommandMemoryDebug'
		]
	],
	'SaharaMemoryReadRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		],
		'default_exends' => [
			'command' => 'kSaharaCommandMemoryRead'
		]
	],
	'SaharaCommandReadyResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'image_tx_status' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandReady'
		]
	],
	'SaharaSwitchModeRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandSwitchMode'
		]
	],
	'SaharaClientCommandRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'client_command' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandExecute'
		]
	],
	'SaharaClientCommandResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'client_command' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandExecuteResponse'
		]
	],
	'SaharaClientCommandExecuteDataRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'client_command' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandExecuteData'
		]
	],
	'SaharaMemoryDebug64Request' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		],
		'default_exends' => [
			'command' => 'kSaharaCommandMemoryDebug64Request'
		]
	],
	'SaharaMemoryRead64Request' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT64,
				'size' => $fieldSizes[FIELD_TYPE_UINT64],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT64,
				'size' => $fieldSizes[FIELD_TYPE_UINT64],
			]
		],
		'default_exends' => [
			'command' => 'kSaharaCommandMemoryDebug64'
		]
	],
	'kSaharaCommandMemoryDebug64Request' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'SaharaPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'client_command' => [ 
				'type' => FIELD_TYPE_UINT64,
				'size' => $fieldSizes[FIELD_TYPE_UINT64],
			],
		],
		'default_exends' => [
			'command' => 'kSaharaCommandMemoryRead64'
		]
	],
];

/**
* Streaming DLOAD Packet Definitions
*/
$packets['streaming_dload'] = [
	'StreamingDloadPacket' => [
		'skip' => true,
		'path' => 'qualcomm/packet'
	],
	'StreamingDloadHelloRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'magic' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 32,
				'size_const' => 'STREAMING_DLOAD_MAGIC_SIZE',
			],
			'version' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'compatible_version' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'feature_bits' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadHello'
		]
	],

	// TODO: Response has dynamic size fields..
	// kStreamingDloadHelloResponse

	'StreamingDloadReadRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'length' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadRead'
		]
	],	
	'StreamingDloadReadResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'data' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
				'allowed_setters' => ['raw','string'],
				'allowed_getters' => ['vector'],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadReadData'
		]
	],

	'StreamingDloadStreamWriteRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'data' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
				'allowed_setters' => ['file','raw','string'],
				'allowed_getters' => ['vector'],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadStreamWrite'
		]
	],	
	'StreamingDloadStreamWriteResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadBlockWritten'
		]
	],


	'StreamingDloadNopRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'identifier' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadNop'
		]
	],	
	'StreamingDloadNopResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'identifier' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadNopResponse'
		]
	],

	'StreamingDloadResetRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadReset'
		]
	],	
	'StreamingDloadResetResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadResetAck'
		]
	],

	'StreamingDloadUnlockRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'code' => [ 
				'type' => FIELD_TYPE_UINT64,
				'size' => $fieldSizes[FIELD_TYPE_UINT64],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadUnlock'
		]
	],	
	'StreamingDloadUnlockResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadUnlocked'
		]
	],

	'StreamingDloadOpenRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'mode' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadOpen'
		]
	],	
	'StreamingDloadOpenResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadOpened'
		]
	],


	'StreamingDloadCloseRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'mode' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadClose'
		]
	],	
	'StreamingDloadCloseResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadClosed'
		]
	],

	'StreamingDloadSecurityModeRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'mode' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadSecurityMode'
		]
	],	
	'StreamingDloadSecurityModeResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadSecurityModeReceived'
		]
	],

	'StreamingDloadPartitionTableRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'override_existing' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'data' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 512,
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadPartitionTable'
		]
	],	
	'StreamingDloadPartitionTableResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'status' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadPartitionTableReceived'
		]
	],

	'StreamingDloadOpenMultiImageRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'type' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadOpenMultiImage'
		]
	],	

	'StreamingDloadOpenMultiImageWithPayloadRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'type' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'payload' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
				'allowed_setters' => ['file','raw','string'],
				'allowed_getters' => ['vector'],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadOpenMultiImage'
		]
	],	

	'StreamingDloadOpenMultiImageResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'status' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadOpenedMultiImage'
		]
	],

	'StreamingDloadEraseFlashRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadEraseFlash'
		]
	],	
	'StreamingDloadEraseFlashResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadFlashErased'
		]
	],

	'StreamingDloadGetEccStateRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadGetEccState'
		]
	],	
	'StreamingDloadGetEccStateResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'status' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadCurrentEccState'
		]
	],

	'StreamingDloadSetEccStateRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'status' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			]
		],
		'default_exends' => [
			'command' => 'kStreamingDloadSetEcc'
		]
	],	
	'StreamingDloadSetEccStateResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadSetEccResponse'
		]
	],

	'StreamingDloadUnframedStreamWriteRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'alignment_padding' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 3,
			],
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'length' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'data' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
				'allowed_setters' => ['file','raw','string'],
				'allowed_getters' => ['vector'],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadUnframedStreamWrite'
		]
	],	
	'StreamingDloadUnframedStreamWriteResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadUnframedStreamWriteResponse'
		]
	],

	'StreamingDloadPowerOffRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
		],
		'default_exends' => [
			'command' => 'kStreamingDloadPowerOff'
		]
	],	
	'StreamingDloadPowerOffResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'StreamingDloadPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'address' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		],
		'default_exends' => [
			'command' => 'kStreamingDloadPoweringDown'
		]
	],
];

/**
* DM/DIAG/QCDM Packet Definitions
*/
$packets['qcdm'] = [
	'DmPacket' => [
		'skip' => true,
		'path' => 'qualcomm/packet'
	],
	'DmPhoneModeRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'mode' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'padding' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8]
			]
		]
	],
	'DmPhoneModeResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'status' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
		]
	],

	'DmSpcRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'spc' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 6,
				'size_const' => 'DIAG_SPC_LENGTH',
				'allowed_setters' => ['raw','string'],
				'allowed_getters' => ['vector','string'],
			],
		]
	],
	'DmSpcResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'status' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
		]
	],

	'DmPasswordRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'password' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 8,
				'size_const' => 'DIAG_PASSWORD_LENGTH',
				'allowed_setters' => ['raw','string'],
				'allowed_getters' => ['vector','string'],
			],
		]
	],
	
	'DmPasswordResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'status' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
		]
	],

	'DmNvReadRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'nv_item' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'data' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 128,
				'size_const' => 'DIAG_NV_ITEM_SIZE',
			],
		]
	],
	'DmNvReadResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'nv_item' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'data' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 128,
				'size_const' => 'DIAG_NV_ITEM_SIZE',
				'allowed_setters' => ['raw','string'],
				'allowed_getters' => ['vector','string'],
			],
		]
	],

	'DmVersionRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'version' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			]
		]
	],
	'DmVersionResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'demod' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'decode' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'interleaver_id' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'esn' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'rm_mode' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'min1' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT32] * 2,
				'allowed_setters' => ['raw','string'],
				'allowed_getters' => ['vector','string'],
			],
			'min2' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT32] * 2,
				'allowed_setters' => ['raw','string'],
				'allowed_getters' => ['vector','string'],
			],
			'min_index' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'cdma_rm_state' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'cdma_good_frames' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'analog_correct_frames' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'analog_bad_frames' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'analog_word_syncs' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'entry_reason' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'current_channel' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'cdma_code_channel' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
			'pilot_base' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'sid' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'nid' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'location_id' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'rssi_level' => [ 
				'type' => FIELD_TYPE_UINT16,
				'size' => $fieldSizes[FIELD_TYPE_UINT16],
			],
			'power' => [ 
				'type' => FIELD_TYPE_UINT8,
				'size' => $fieldSizes[FIELD_TYPE_UINT8],
			],
		]
	],

	'DmGuidRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
		]
	],

	'DmGuidResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'guid' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT32] * 4,
				'allowed_setters' => ['raw','string'],
				'allowed_getters' => ['vector','string'],
			],
		]
	],
];

/**
* QCDM EFS Packet Definitions
*/
$packets['qcdm_efs'] = [
	'DmEfsPacket' => [
		'skip' => true,
		'path' => 'qualcomm/packet'
	],


	'DmEfsHelloRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'target_packet_window_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'target_packet_window_byte_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'host_packet_window_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'host_packet_window_byte_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'dir_iterator_window_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'dir_iterator_window_byte_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'feature_bits' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'DmEfsHelloResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'target_packet_window_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'target_packet_window_byte_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'host_packet_window_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'host_packet_window_byte_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'dir_iterator_window_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'dir_iterator_window_byte_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_version' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'feature_bits' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],



	'QcdmEfsQueryRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
		]
	],

	'QcdmEfsQueryResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'max_file_name_length' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_pathname_length' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_symlink_depth' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_file_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_directories' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_mounts' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsOpenFileRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'flags' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'file_path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],

	'QcdmEfsOpenFileResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'fp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsCloseFileRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'fp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsCloseFileReponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsReadFileRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'fp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'offset' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsReadFileResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'fp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'offset' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'bytes_read' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'data' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsWriteFileRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'fp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'offset' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'data' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],

	'QcdmEfsWriteFileResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'fp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'offset' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'bytes_written' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsCreateLinkRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
			'new_path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],

	'QcdmEfsCreateLinkResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsReadLinkRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'local',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],

	'QcdmEfsUnlinkRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsUnlinkResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsMkdirRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsMkdirResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsRmdirRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsRmdirResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsOpenDirRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsOpenDirResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'dp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsReadDirRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'dp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'sequence_number' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],


	'QcdmEfsReadDirResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'dp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'sequence_number' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'entry_type' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'atime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mtime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'ctime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'name' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsCloseDirRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'dp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],


	'QcdmEfsCloseDirResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsRenameRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
			'new_path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsRenameResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsStatRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsStatResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'link_count' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'atime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mtime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'ctime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsLstatRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsLstatResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'atime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mtime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'ctime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],


	'QcdmEfsFstatRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'fp' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],


	'QcdmEfsFstatResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'link_count' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'atime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'mtime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'ctime' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsChmodRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'mode' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsChmodResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		]
	],

	'QcdmEfsStatfsRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsStatfsResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'filesystem_id' => [ 
				'type' => FIELD_TYPE_UARRAY,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 8,
			],
			'filesystem_type' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'block_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'total_blocks' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'available_blocks' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'free_blocks' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_file_size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'file_count' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'max_file_count' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
		]
	],

	'QcdmEfsAccessRequest' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'permission_mask' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'path' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => 0,
			],
		]
	],


	'QcdmEfsAccessResponse' => [
		'namespace' => 'QC',
		'path'	  => 'qualcomm/packet',
		'extends' => 'DmEfsPacket',
		'extends_namespace' => 'OpenPST::QC',
		'source'  => 'remote',
		'fields'  => [
			'error' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			]
		]
	],
];

/**
* DLOAD Packet Definitions
*/
$packets['dload'] = [
	'DloadPacket' => [
		'skip' => true,
		'path' => 'qualcomm/packet'
	],
];

/**
* LG LAF Packet Definitions
*/
$packets['laf'] = [
	/*'LafPacket' => [
		'skip' => true,
		'path' => 'lg/packet'
	],*/
	'LafPacket' => [
		'namespace' => 'LG',
		'path'	  => 'lg/packet',
		'extends' => 'Packet',
		'extends_namespace' => 'OpenPST::Serial',
		'source'  => 'local',
		'fields'  => [
			'command' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'arg0' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'arg1' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'arg_opt0' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'arg_opt1' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'size' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'crc' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'magic' => [ 
				'type' => FIELD_TYPE_UINT32,
				'size' => $fieldSizes[FIELD_TYPE_UINT32],
			],
			'data' => [ 
				'type' => FIELD_TYPE_VARIABLE,
				'size' => $fieldSizes[FIELD_TYPE_UINT8] * 2,
			],
		]
	],
];