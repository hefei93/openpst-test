/**
* LICENSE PLACEHOLDER
*
* @file qcdm_efs_rmdir_response.cpp
* @package openpst/libopenpst
* @brief 
*
* @author Gassan Idriss <ghassani@gmail.com>
*/

#include "qualcomm/packet/qcdm_efs_rmdir_response.h"

QcdmEfsRmdirResponse::QcdmEfsRmdirResponse() : DmEfsPacket()
{
	addField("error", kPacketFieldTypePrimitive, sizeof(uint32_t));

}

QcdmEfsRmdirResponse::~QcdmEfsRmdirResponse()
{

}

uint32_t QcdmEfsRmdirResponse::getError()
{
    return read<uint32_t>(getFieldOffset("error"));
}
                
void QcdmEfsRmdirResponse::setError(uint32_t error)
{
    write<uint32_t>("error", error);
}

void QcdmEfsRmdirResponse::unpack(std::vector<uint8_t>& data)
{
	
}