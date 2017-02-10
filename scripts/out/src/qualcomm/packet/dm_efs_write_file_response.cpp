/**
*
* (c) Gassan Idriss <ghassani@gmail.com>
* 
* This file is part of libopenpst.
* 
* libopenpst is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
* 
* libopenpst is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
* 
* You should have received a copy of the GNU General Public License
* along with libopenpst. If not, see <http://www.gnu.org/licenses/>.
*
* @file dm_efs_write_file_response.cpp
* @package openpst/libopenpst
* @brief 
*
* @author Gassan Idriss <ghassani@gmail.com>
*/

#include "qualcomm/packet/dm_efs_write_file_response.h"

using namespace OpenPST::QC;

DmEfsWriteFileResponse::DmEfsWriteFileResponse(PacketEndianess targetEndian) : DmEfsPacket(targetEndian)
{
	addField("fp", kPacketFieldTypePrimitive, sizeof(uint32_t));
	addField("offset", kPacketFieldTypePrimitive, sizeof(uint32_t));
	addField("bytes_written", kPacketFieldTypePrimitive, sizeof(uint32_t));
	addField("error", kPacketFieldTypePrimitive, sizeof(uint32_t));

}

DmEfsWriteFileResponse::~DmEfsWriteFileResponse()
{

}

uint32_t DmEfsWriteFileResponse::getFp()
{
    return read<uint32_t>(getFieldOffset("fp"));
}
                
void DmEfsWriteFileResponse::setFp(uint32_t fp)
{
    write<uint32_t>("fp", fp);
}
uint32_t DmEfsWriteFileResponse::getOffset()
{
    return read<uint32_t>(getFieldOffset("offset"));
}
                
void DmEfsWriteFileResponse::setOffset(uint32_t offset)
{
    write<uint32_t>("offset", offset);
}
uint32_t DmEfsWriteFileResponse::getBytesWritten()
{
    return read<uint32_t>(getFieldOffset("bytes_written"));
}
                
void DmEfsWriteFileResponse::setBytesWritten(uint32_t bytesWritten)
{
    write<uint32_t>("bytes_written", bytesWritten);
}
uint32_t DmEfsWriteFileResponse::getError()
{
    return read<uint32_t>(getFieldOffset("error"));
}
                
void DmEfsWriteFileResponse::setError(uint32_t error)
{
    write<uint32_t>("error", error);
}

void DmEfsWriteFileResponse::unpack(std::vector<uint8_t>& data)
{
	DmEfsPacket::unpack(data);
}